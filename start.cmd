@echo off
TITLE PocketMine-MO server software for Minecraft: Pocket Edition
cd /d %~dp0

if exist bin\php\php.exe (
	set PHPRC=""
	set PHP_BINARY=bin\php\php.exe
	) else (
	set PHP_BINARY=php
	)

if exist PocketMine-MO*.phar (
	set POCKETMINE_FILE=PocketMine-MO*.phar
) else (
    if exist PocketMine-MP.phar (
        set POCKETMINE_FILE=PocketMine-MP.phar
	) else (
	    if exist src\pocketmine\PocketMine.php (
	        set POCKETMINE_FILE=src\pocketmine\PocketMine.php
        ) else (
            if exist PocketMine-MO.phar (
                set POCKETMINE_FILE=PocketMine-MO.phar
            ) else (
		        echo "[ERROR] Couldn't find a valid PocketMine installation."
		        pause
		        exit 8
		    )
	    )
	)
)

if exist bin\mintty.exe (
	start "" bin\mintty.exe -o Columns=88 -o Rows=32 -o AllowBlinking=0 -o FontQuality=3 -o Font="Consolas" -o FontHeight=12 -o CursorType=0 -o CursorBlinks=1 -h error -t "PocketMine-MO" -i bin/pocketmine.ico -w max %PHP_BINARY% %POCKETMINE_FILE% --enable-ansi %*
	) else (
	%PHP_BINARY% -c bin\php %POCKETMINE_FILE% %*
	)