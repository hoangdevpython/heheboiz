{ pkgs }: {
	deps = [
    (pkgs.php81.buildEnv {
      extensions = { all, ... }: with all; [ curl session pdo_sqlite];
    	extraConfig = "
        error_reporting=Off
		allow_url_include=On
		memory_limit=200M 
		session.name=C
		post_max_size=500M
		upload_max_filesize=1G
		opcache.fast_shutdown=1
		opcache.file_update_protection=0
		opcache.validate_timestamps=0
		opcache.interned_strings_buffer=16
      ";
    })
    pkgs.php.extensions.curl
    #pkgs.php.extensions.yaml
    #pkgs.php.extensions.swoole
    pkgs.php.packages.composer
	pkgs.php.extensions.session
	pkgs.php.extensions.pdo_sqlite
	];
}