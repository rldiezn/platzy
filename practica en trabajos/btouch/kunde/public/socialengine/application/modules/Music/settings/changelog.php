<?php
/**
 * SocialEngine
 *
 * @category   Application_Extensions
 * @package    Music
 * @copyright  Copyright 2006-2010 Webligo Developments
 * @license    http://www.socialengine.com/license/
 * @version    $Id: changelog.php 10267 2014-06-10 00:55:28Z lucas $
 * @author     John
 */
return array(
  '4.8.5' => array(
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    'settings/changelog.php' => 'Incremented version',
    'views/scripts/_composeMusic.tpl' => 'News feed form attachment links always load with the same order',
    'views/scripts/_FancyUpload.tpl' => 'Added restrictions to the file types in the file inputs',
  ),
  '4.8.1' => array(
    'externals/scripts/core.js' => 'Fixed a bug where Music player would break if using a CDN',
    'settings/manifest.php' => 'Incremented version',
    'settings/changelog.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.8.0' => array(
    'Model/PlaylistSong.php' => 'Added a missing function',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.7.0' => array(
    'externals/images/*' => 'Optimized images',
    'externals/scripts/core.js' => 'Upgraded SoundManager',
    'views/scripts/_composeMusic.tpl' => 'Defer script loading',
    'settings/my.sql' => 'Incremented version',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
  ),
  '4.5.0' => array(
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/index/create.tpl' => 'Setting active class on main menu',
    'views/scripts/index/manage.tpl' => 'Setting active class on main menu',
    'views/scripts/playlist/edit.tpl' => 'Setting active class on main menu',
    'views/scripts/playlist/view.tpl' => 'Setting active class on main menu',
    'widgets/browse-menu/Controller.php' => 'Hides menu if only one item',
  ),
  '4.3.0' => array(
    'controllers/AdminSettingsController.php' => 'Fixed issue with saving max number of playlists',
    'controllers/IndexController.php' => 'Added new pages to layout editor',
    'externals/styles/mobile.css' => 'Allow mobile upload',
    'Form/Admin/Global.php' => 'Fixed issue with saving max number of playlists',
    'settings/changelog.php' => 'Incremented version',
    'settings/install.php' => 'Added new pages to layout editor',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/admin-manage/index.tpl' => 'Improved admin panel styles',
    'views/scripts/index/create.tpl' => 'Added new pages to layout editor',
    'views/scripts/index/manage.tpl' => 'Added new pages to layout editor',
    'widgets/browse-menu/Controller.php' => 'Added new pages to layout editor',
  ),
  '4.2.8' => array(
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.2.6' => array(
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.2.3' => array(
    '/application/languages/en/music.csv' => 'Rewrite Profile viewing and Profile Commenting Options Descriptions',
    'Form/Create.php' => 'Different',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.2.2' => array(
    'externals/styles/main.css' => 'MooTools 1.4 compatibility',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.2.0' => array(
    'externals/scripts/composer_music.js' => 'Added namespace for Wibiya compatibility',
    'externals/scripts/core.js' => 'Added namespace for Wibiya compatibility',
    'externals/scripts/player.js' => 'Added namespace for Wibiya compatibility',
    'Plugin/Job/Maintenance/RebuildPrivacy.php' => 'Fixed incorrectly named class',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.1.8p1' => array(
    'externals/scripts/composer_music.js' => 'Added cross domain policy file for CDN support',
    'externals/scripts/player.js' => 'Fixed issue with CDN/Flash cross-domain',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/_FancyUpload.tpl' => 'Added cross domain policy file for CDN support',
  ),
  '4.1.8' => array(
    'controllers/IndexController.php' => 'Added pages to the layout editor',
    'controllers/PlaylistController.php' => 'Added pages to the layout editor',
    'externals/.htaccess' => 'Updated with far-future expires headers for static resources',
    'externals/scripts/composer_music.js' => 'Added debug options',
    'externals/scripts/player.js' => 'Added static base URL for CDN support',
    'externals/styles/main.css' => 'Style tweaks for layout editor; fixed style issues with popout player',
    'settings/changelog.php' => 'Incremented version',
    'settings/content.php' => 'Added pages to the layout editor',
    'settings/install.php' => 'Added pages to the layout editor',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/_composeMusic.tpl' => 'Added static base URL for CDN support',
    'views/scripts/_FancyUpload.tpl' => 'Added static base URL for CDN support; fixed timeout issue when uploading large files',
    'views/scripts/_Player.tpl' => 'Added static base URL for CDN support; compatibility for AJAX page loader',
    'views/scripts/index/browse.tpl' => 'Added pages to the layout editor',
    'views/scripts/playlist/view.tpl' => 'Added pages to the layout editor',
    'widgets/browse-menu-quick/Controller.php' => 'Added',
    'widgets/browse-menu-quick/index.tpl' => 'Added',
    'widgets/browse-menu/Controller.php' => 'Added',
    'widgets/browse-menu/index.tpl' => 'Added',
    'widgets/browse-search/Controller.php' => 'Added',
    'widgets/browse-search/index.tpl' => 'Added',
    'widgets/profile-music/Controller.php' => 'Fixed issue where title would not be displayed when placed outside a tab container widget',
  ),
  '4.1.7' => array(
    'externals/scripts/player.js' => 'Fixed issue where mp3 files would not play if the extension was uppercase',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.1.6' => array(
    'externals/images/nophoto_playlist_song_thumb_icon.png' => 'Added',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.1.4' => array(
    'externals/styles/main.css' => 'Added svn:keywords Id',
    'externals/styles/mobile.css' => 'Added',
    'Model/Playlist.php' => 'Fixed issue with playing playlist on profile',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my-upgrade-4.1.3-4.1.4.sql' => 'Added',
    'settings/my.sql' => 'Incremented version; Inserts menu item for mobile',
  ),
  '4.1.3' => array(
    'externals/scripts/core.js' => 'Fixed issue initializing player when loaded with AJAX',
    'externals/scripts/player.js' => 'Fixed skipping caused by floating point rounding errors for songs longer than five minutes',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/_Player.tpl' => 'Fixed issue initializing player when loaded with AJAX',
  ),
  '4.1.2' => array(
    'Api/Core.php' => 'Sort by creation date if there is no sort parameter defined',
    'externals/styles/main.css' => 'Added styles',
    'settings/changelog.php' => 'Incremented version',
    'settings/content.php' => 'Added widgets',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/_Player.tpl' => 'Fixed issue initializing player when loaded with AJAX',
    'widgets/list-popular-playlists/Controller.php' => 'Added',
    'widgets/list-popular-playlists/index.tpl' => 'Added',
    'widgets/list-recent-playlists/Controller.php' => 'Added',
    'widgets/list-recent-playlists/index.tpl' => 'Added',
  ),
  '4.1.1' => array(
    'Api/Core.php' => 'Fixed privacy issue with playlists added to a message',
    'externals/.htaccess' => 'Added keywords; removed deprecated code',
    'externals/scripts/player.js' => 'Changes for storage system modifications',
    'Form/Edit.php' => 'Fixed privacy issue with playlists added to a message',
    'Model/DbTable/Playlists.php' => 'Fixed privacy issue with playlists added to a message',
    'Model/Playlist.php' => 'Fixed privacy issue with playlists added to a message',
    'Model/PlaylistSong.php' => 'Changes for storage system modifications',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my-upgrade-4.1.0-4.1.1.sql' => 'Added',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/index/browse.tpl' => 'Fixed bug where set as profile playlist would delete playlist only on browse page',
    'widgets/profile-music/Controller.php' => 'Fixed privacy issue',
  ),
  '4.1.0' => array(
    '/application/languages/en/music.csv' => 'Fixed phrases with stray double-quotes',
    'Api/Core.php' => 'Refactored',
    'controllers/AdminLevelController.php' => 'Added notice on form save',
    'controllers/AdminManageController.php' => 'Fixed issue with deletion',
    'controllers/AdminSettingsController.php' => 'Added notice on form save',
    'controllers/IndexController.php' => 'Refactored',
    'controllers/PlaylistController.php' => 'Added',
    'controllers/SongController.php' => 'Added',
    'externals/scripts/composer_music.js' => 'Fixed incorrect url',
    'externals/scripts/core.js' => 'Refactored; moved soundmanager to externals/soundmanager',
    'externals/scripts/player.js' => 'Refactored; moved soundmanager to externals/soundmanager',
    'externals/soundmanager/*' => 'Removed; moved to externals/soundmanager',
    'externals/styles/main.css' => 'Added styles',
    'Form/Admin/Global.php' => 'Moved public view permission to level settings page',
    'Form/Create.php' => 'Fixed issue with disabled privacy options',
    'Form/Delete.php' => 'Added',
    'Form/Edit.php' => 'Fixed issue with disabled privacy options',
    'Form/Playlist.php' => 'Removed',
    'Form/Search.php' => 'Added filtering options',
    'Form/Song/Append.php' => 'Added',
    'Model/DbTable/Playlists.php' => 'Added special playlist method for feed post/messages',
    'Model/Playlist.php' => 'Added slugs to URLs',
    'Model/PlaylistSong.php' => 'Code formatting',
    'Model/Song.php' => 'Removed deprecated code',
    'Plugin/Job/Maintenance/RebuildPrivacy.php' => 'Added',
    'Plugin/Menus.php' => 'Added',
    'Plugin/Task/Cleanup.php' => 'Added',
    'Plugin/Task/Maintenance/Cleanup.php' => 'Removed',
    'Plugin/Task/Maintenance/RebuildPrivacy.php' => 'Removed',
    'settings/changelog.php' => 'Incremented version',
    'settings/content.php' => 'Added pagination/item count limits to widgets',
    'settings/manifest.php' => 'Incremented version',
    'settings/my-upgrade-4.0.3-4.0.4.sql' => 'Backwards compatibility fix for tasks modifications',
    'settings/my-upgrade-4.0.4-4.0.5.sql' => 'Backwards compatibility fix for tasks modifications',
    'settings/my-upgrade-4.0.5p2-4.1.0.sql' => 'Added',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/_composeMusic.tpl' => 'Added file extension filter',
    'views/scripts/_FancyUpload.tpl' => 'Added slugs to URLs',
    'views/scripts/_Player.tpl' => 'Much javascript code refactored to javascript files',
    'views/scripts/admin-manage/delete.tpl' => 'Added',
    'views/scripts/admin-manage/index.tpl' => 'Fixed issues with deletion',
    'views/scripts/index/browse.tpl' => 'Added navigation to menu system',
    'views/scripts/index/delete.tpl' => 'UI improvements',
    'views/scripts/index/edit.tpl' => 'Removed',
    'views/scripts/index/manage.tpl' => 'Added navigation to menu system; added filtering options',
    'views/scripts/index/playlist-append.tpl' => 'Removed',
    'views/scripts/index/playlist.tpl' => 'Removed',
    'views/scripts/playlist/delete.tpl' => 'Added',
    'views/scripts/playlist/edit.tpl' => 'Added',
    'views/scripts/playlist/view.tpl' => 'Added',
    'views/scripts/song/append.tpl' => 'Added',
    'widgets/profile-music/Controller.php' => 'Added pagination/item count limit',
    'widgets/profile-music/index.tpl' => 'Added pagination/item count limit',
    'widgets/profile-player/index.tpl' => 'Refactored',
  ),
  '4.0.5p2' => array(
    'Api/Core.php' => 'Fixed vulnerability that could allow upload of non-music files',
    'settings/changelog.php' => 'Incremented version',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
  ),
  '4.0.5' => array(
    'controllers/AdminLevelController.php' => 'Fixed bug preventing switching level; emoved deprecated code',
    'controllers/AdminManageController.php' => 'Added admin suggest for widget form',
    'controllers/IndexController.php' => 'Fixed issue preventing admin from editing playlist; removed deprecated context switch code',
    'externals/scripts/composer_music.js' => 'Fixed composer preview player',
    'externals/scripts/core.js' => 'Added separate CSS classes for enable/disable profile playlist',
    'externals/styles/admin/main.css' => 'Added',
    'externals/styles/main.css' => 'Added separate CSS classes for enable/disable profile playlist',
    'Form/Admin/Settings/Level.php' => 'Added registered privacy type',
    'Form/Admin/Widget/HomePlaylist.php' => 'Added',
    'Form/Create.php' => 'Added registered privacy type; added missing .jpeg extension to allowed file types',
    'Model/Playlist.php' => 'Minor performance improvement',
    'Model/PlaylistSong.php' => 'Added missing translation; fixed issue with exceptions while deleting files',
    'Model/Song.php' => 'Compat for search index changes',
    'Plugin/Task/Maintenance/Cleanup.php' => 'Added',
    'Plugin/Task/Maintenance/RebuildPrivacy.php' => 'Added idle support',
    'settings/changelog.php' => 'Added',
    'settings/content.php' => 'Added widget',
    'settings/manifest.php' => 'Incremented version',
    'settings/my-upgrade-4.0.4-4.0.5.sql' => 'Added',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/_FancyUpload.tpl' => 'Logging is enabled in development mode',
    'views/scripts/_Player.tpl' => 'Now uses javascript translation api',
    'views/scripts/admin-level/index.tpl' => 'Fixed bug preventing changing level',
    'views/scripts/index/browse.tpl' => 'Added separate CSS classes for enable/disable profile playlist',
    'views/scripts/index/manage.tpl' => 'Added separate CSS classes for enable/disable profile playlist',
    'views/scripts/index/playlist.tpl' => 'Added separate CSS classes for enable/disable profile playlist',
    'widgets/home-playlist/admin.tpl' => 'Added',
    'widgets/home-playlist/Controller.php' => 'Added',
    'widgets/home-playlist/index.tpl' => 'Added',
  ),
  '4.0.4' => array(
    'externals/soundmanager/script/soundmanager2.js' => 'Improved RTL support',
    'externals/styles/main.css' => 'Improved RTL support',
    'Form/Playlist.php' => 'Removing deprecated code',
    'Plugin/Task/Maintenance/RebuildPrivacy.php' => 'Added to fix privacy issues in the feed',
    'settings/manifest.php' => 'Incremented version',
    'settings/my-upgrade-4.0.3-4.0.4.sql' => 'Added',
    'settings/my.sql' => 'Incremented version',
    'views/scripts/_composeMusic.tpl' => 'Added missing translation',
    'views/scripts/_FancyUpload.tpl' => 'Added missing translation',
    'views/scripts/_formButtonCancel.tpl' => 'Removing deprecated code',
    'views/scripts/index/manage.tpl' => 'Added missing translation',
  ),
  '4.0.3' => array(
    'controllers/IndexController.php' => 'Fixes for activity privacy problems, default playlists per page increased',
    'Form/Create.php' => 'Cleanup',
    'Model/PlaylistSong.php' => 'Fixes song deletion when deleting playlist',
    'settings/manifest.php' => 'Incremented version',
    'settings/my.sql' => 'Incremented version',
    '/application/languages/en/music.csv' => 'Added phrases',
  ),
  '4.0.2' => array(
    'controllers/AdminLevelController.php' => 'Various level settings fixes and enhancements',
    'Form/Admin/Level.php' => 'Moved',
    'Form/Admin/Settings/Level.php' => 'Various level settings fixes and enhancements',
    'settings/manifest.php' => 'Incremented version',
    'settings/my-upgrade-4.0.1-4.0.2.sql' => 'Added',
    'settings/my.sql' => 'Various level settings fixes and enhancements',
    'views/scripts/index/manage.tpl' => 'Missing translations',
  ),
  '4.0.1' => array(
    'controllers/IndexController.php' => 'Default playlists default to searchable and fixed public permissions',
    'Form/Admin/Level.php' => 'Fixed problem in level select',
    'Model/Playlist.php' => 'Better cleanup of temporary files',
    'Plugin/Core.php' => 'Query optimization',
    'settings/manifest.php' => 'Incremented version',
  ),
) ?>