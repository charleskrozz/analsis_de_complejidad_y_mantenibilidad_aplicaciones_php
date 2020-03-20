@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../halleck45/phpmetrics/bin/phpmetrics
php "%BIN_TARGET%" %*
