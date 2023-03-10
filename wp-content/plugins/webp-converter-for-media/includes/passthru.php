<?php
/**
 * Loads images in WebP format or original images if browser does not support WebP.
 *
 * @category WordPress Plugin
 * @package  Converter for Media
 * @author   Mateusz Gbiorczyk
 * @link     https://wordpress.org/plugins/webp-converter-for-media/
 */

/**
 * Loads lighter weight image files in output format instead of original formats.
 */
class PassthruLoader {

	const PATH_UPLOADS      = '';
	const PATH_UPLOADS_WEBP = '';
	const MIME_TYPES        = '';

	public function __construct() {
		if ( ( self::PATH_UPLOADS === '' ) || ( self::PATH_UPLOADS_WEBP === '' ) || ( self::MIME_TYPES === '' ) ) {
			http_response_code( 404 );
			exit;
		}

		$image_url = $_GET['src'] ?? null; // phpcs:ignore WordPress.Security
		if ( ! $image_url || ! $this->validate_src_param( $image_url ) ) {
			return;
		}

		$this->load_converted_image( $image_url );
	}

	private function validate_src_param( string $image_url ): bool {
		$url_path     = parse_url( $image_url, PHP_URL_PATH ) ?: '';
		$encoded_path = array_map( 'urlencode', explode( '/', $url_path ) );
		$encoded_url  = str_replace( $url_path, implode( '/', $encoded_path ), $image_url );

		if ( filter_var( $encoded_url, FILTER_VALIDATE_URL ) === false ) {
			return false;
		}

		$image_host = parse_url( $image_url, PHP_URL_HOST );
		if ( $image_host !== ( $_SERVER['HTTP_HOST'] ?? '' ) ) { // phpcs:ignore WordPress.Security
			return false;
		}

		$image_extension = strtolower( pathinfo( $image_url, PATHINFO_EXTENSION ) );
		if ( ! in_array( $image_extension, [ 'jpg', 'jpeg', 'png', 'gif', 'png2' ] ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Initializes loading of image in supported output format.
	 *
	 * @param string $image_url URL of source image.
	 *
	 * @return void
	 */
	private function load_converted_image( string $image_url ) {
		$mime_types    = json_decode( self::MIME_TYPES, true ) ?: [];
		$headers       = array_change_key_case(
			array_merge( ( function_exists( 'getallheaders' ) ) ? getallheaders() : [], $_SERVER ),
			CASE_UPPER
		);
		$accept_header = $headers['ACCEPT'] ?? ( $headers['HTTP_ACCEPT'] ?? '' );

		foreach ( $mime_types as $extension => $mime_type ) {
			if ( ( strpos( $accept_header, $mime_type ) !== false )
				&& ( $source = $this->load_image_source( $image_url, $extension ) ) ) {
				header( 'Content-Type: ' . $mime_type );
				echo $source; // phpcs:ignore
				exit;
			}
		}
		$this->load_image_default( $image_url );
	}

	/**
	 * Loads image output format.
	 *
	 * @param string $image_url URL of source image.
	 * @param string $extension Extension of output format.
	 *
	 * @return string|null Content of image in output format.
	 */
	private function load_image_source( string $image_url, string $extension ) {
		$url = $this->generate_source_url( $image_url, $extension );
		$ch  = curl_init( $url );
		if ( $ch === false ) {
			return null;
		}

		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		$response = curl_exec( $ch );
		$code     = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		curl_close( $ch );

		if ( ( $code !== 200 ) || ! $response ) {
			return null;
		} else {
			return ( is_string( $response ) ) ? $response : null;
		}
	}

	/**
	 * Returns URL of output image by replacing URL of source image.
	 *
	 * @param string $image_url URL of source image.
	 * @param string $extension Extension of output format.
	 *
	 * @return string URL of image in output format.
	 */
	private function generate_source_url( string $image_url, string $extension ): string {
		return sprintf(
			'%1$s.%2$s',
			str_replace( self::PATH_UPLOADS, self::PATH_UPLOADS_WEBP, $image_url ),
			$extension
		);
	}

	/**
	 * Redirects to source image.
	 *
	 * @param string $image_url URL of source image.
	 *
	 * @return void
	 */
	private function load_image_default( string $image_url ) {
		header( 'Location: ' . $image_url );
	}
}

new PassthruLoader();
