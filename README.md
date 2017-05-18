[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/GoogleDrive/functions?utm_source=RapidAPIGitHub_GoogleDriveFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)# GoogleDrive Package
Test description
* Domain: [https://www.google.com/drive/](https://https://www.google.com/drive/)
* Credentials: clientId, clientSecret

## How to get credentials: 
1. Item one
 
## GoogleDrive.getAccessToken
Get AccessToken

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client ID
| clientSecret| credentials| Client secret
| code        | String     | Code you received from Google after the user granted access
| redirectUri | String     | The same redirect URL as in received Code step.

## GoogleDrive.getMe
Gets information about the user, the user's Drive, and system capabilities.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fields     | Array | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getStartPageToken
Gets the starting pageToken for listing future changes.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId       | String | The ID of the Team Drive for which the starting pageToken for listing future changes from that Team Drive will be returned.

## GoogleDrive.getChanges
Lists the changes for a user or Team Drive.

| Field                | Type   | Description
|----------------------|--------|----------
| accessToken          | String | Access Token. Use getAccessToken to get it
| pageToken            | String | The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response or to the response from the getStartPageToken method.
| includeCorpusRemovals| Boolean| Whether changes should include the file resource if the file is still accessible by the user at the time of the request, even when a file was removed from the list of changes and there will be no further change entries for this file. (Default: false)
| includeRemoved       | Boolean| Whether to include changes indicating that items have been removed from the list of changes, for example by deletion or loss of access. (Default: true)
| includeTeamDriveItems| Boolean| Whether Team Drive files or changes should be included in results. (Default: false)
| pageSize             | Number | The maximum number of changes to return per page. Acceptable values are 1 to 1000, inclusive. (Default: 100)
| restrictToMyDrive    | Boolean| Whether to restrict the results to changes inside the My Drive hierarchy. This omits changes to files such as those in the Application Data folder or shared files which have not been added to My Drive. (Default: false)
| spaces               | String | A comma-separated list of spaces to query within the user corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
| supportsTeamDrives   | Boolean| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId          | String | The Team Drive from which changes will be returned. If specified the change IDs will be reflective of the Team Drive; use the combined Team Drive ID and change ID as an identifier.

## GoogleDrive.subscribeToUserChanges
Subscribes to changes for a user.

| Field                | Type   | Description
|----------------------|--------|----------
| accessToken          | String | Access Token. Use getAccessToken to get it
| pageToken            | String | The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response or to the response from the getStartPageToken method.
| includeCorpusRemovals| Boolean| Whether changes should include the file resource if the file is still accessible by the user at the time of the request, even when a file was removed from the list of changes and there will be no further change entries for this file. (Default: false)
| includeRemoved       | Boolean| Whether to include changes indicating that items have been removed from the list of changes, for example by deletion or loss of access. (Default: true)
| includeTeamDriveItems| Boolean| Whether Team Drive files or changes should be included in results. (Default: false)
| pageSize             | Number | The maximum number of changes to return per page. Acceptable values are 1 to 1000, inclusive. (Default: 100)
| restrictToMyDrive    | Boolean| Whether to restrict the results to changes inside the My Drive hierarchy. This omits changes to files such as those in the Application Data folder or shared files which have not been added to My Drive. (Default: false)
| spaces               | String | A comma-separated list of spaces to query within the user corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
| supportsTeamDrives   | Boolean| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId          | String | The Team Drive from which changes will be returned. If specified the change IDs will be reflective of the Team Drive; use the combined Team Drive ID and change ID as an identifier.

## GoogleDrive.stopWatchingChannelResources
Stop watching resources through this channel

| Field      | Type   | Description
|------------|--------|----------
| accessToken| String | Access Token. Use getAccessToken to get it
| kind       | String | Identifies this as a notification channel used to watch for changes to a resource. Value: the fixed string "api#channel".
| id         | String | A UUID or similar unique string that identifies this channel.
| resourceId | String | An opaque ID that identifies the resource being watched on this channel. Stable across different API versions.
| resourceUri| String | A version-specific identifier for the watched resource.
| token      | String | An arbitrary string delivered to the target address with each notification delivered over this channel. Optional.
| expiration | Number | Date and time of notification channel expiration, expressed as a Unix timestamp, in milliseconds. Optional.
| type       | String | The type of delivery mechanism used for this channel.
| address    | String | The address where notifications are delivered for this channel.
| payload    | Boolean| A Boolean value to indicate whether payload is wanted. Optional.
| params     | Array  | Additional parameters controlling delivery channel behavior. Optional.

## GoogleDrive.createFileComment
Creates a new comment on a file.

| Field                 | Type  | Description
|-----------------------|-------|----------
| accessToken           | String| Access Token. Use getAccessToken to get it
| fileId                | String| The ID of the file.
| content               | String| The plain text content of the comment. This field is used for setting the content, while htmlContent should be displayed.
| anchor                | String| A region of the document represented as a JSON string. See anchor documentation for details on how to define and interpret anchor properties.
| quotedFileContentValue| String| The quoted content itself. This is interpreted as plain text if set through the API.

## GoogleDrive.deleteFileComment
Deletes a comment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| commentId  | String| The ID of the comment.

## GoogleDrive.getFileSingleComment
Gets a comment by ID.

| Field         | Type   | Description
|---------------|--------|----------
| accessToken   | String | Access Token. Use getAccessToken to get it
| fileId        | String | The ID of the file.
| commentId     | String | The ID of the comment.
| includeDeleted| Boolean| Whether to return deleted comments. Deleted comments will not include their original content. (Default: false)

## GoogleDrive.getFileComments
Lists a file's comments.

| Field            | Type   | Description
|------------------|--------|----------
| accessToken      | String | Access Token. Use getAccessToken to get it
| fileId           | String | The ID of the file.
| includeDeleted   | Boolean| Whether to include deleted comments. Deleted comments will not include their original content. (Default: false)
| pageSize         | Number | The maximum number of comments to return per page. Acceptable values are 1 to 100, inclusive. (Default: 20)
| pageToken        | String | The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| startModifiedTime| String | The minimum value of 'modifiedTime' for the result comments (RFC 3339 date-time).

## GoogleDrive.updateFileComment
Lists a file's comments.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| commentId  | String| The ID of the comment.
| content    | String| The plain text content of the comment. This field is used for setting the content, while htmlContent should be displayed.

## GoogleDrive.copyFile
Lists a file's comments.

| Field                  | Type   | Description
|------------------------|--------|----------
| accessToken            | String | Access Token. Use getAccessToken to get it
| fileId                 | String | The ID of the file.
| ignoreDefaultVisibility| Boolean| Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever    | Boolean| Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage            | String | A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives     | Boolean| Whether the requesting application supports Team Drives. (Default: false)
| appProperties          | Array  | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| thumbnailImage         | String | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| thumbnailMimeType      | String | The MIME type of the thumbnail.
| description            | String | A short description of the file.
| mimeType               | String | The MIME type of the file. Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded. If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime           | String | The last time the file was modified by anyone (RFC 3339 date-time). Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                   | String | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| parents                | Array  | The IDs of the parent folders which contain the file. If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| properties             | Array  | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                | Boolean| Whether the user has starred the file.
| viewedByMeTime         | String | The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent  | Boolean| Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare        | Boolean| Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.

## GoogleDrive.createFile
Creates a new file.

| Field                    | Type   | Description
|--------------------------|--------|----------
| accessToken              | String | Access Token. Use getAccessToken to get it
| uploadType               | String | The type of upload request to the /upload URI. Acceptable values are: "media" - Simple upload. Upload the media only, without any metadata. "multipart" - Multipart upload. Upload both the media and its metadata, in a single request. "resumable" - Resumable upload. Upload the file in a resumable fashion, using a series of at least two requests where the first request includes the metadata.
| ignoreDefaultVisibility  | Boolean| Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever      | Boolean| Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage              | String | A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives       | Boolean| Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText| Boolean| Whether to use the uploaded content as indexable text. (Default: false)
| appProperties            | JSON   | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| indexableText            | String | Text to be indexed for the file to improve fullText queries. This is limited to 128KB in length and may contain HTML elements.
| thumbnailImage           | String | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| mimeType                 | String | The MIME type of the thumbnail.

## GoogleDrive.deleteFile
Permanently deletes a file owned by the user without moving it to the trash. If the file belongs to a Team Drive the user must be an organizer on the parent. If the target is a folder, all descendants owned by the user are also deleted.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| fileId            | String | The ID of the file.
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)

## GoogleDrive.emptyTrash
Permanently deletes all of the user's trashed files.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it

## GoogleDrive.exportFile
Exports a Google Doc to the requested MIME type and returns the exported content.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| mimeType   | String| The MIME type of the format requested for this export.

## GoogleDrive.generateFileIds
Generates a set of file IDs which can be provided in create requests.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| count      | Number| The number of IDs to return. Acceptable values are 1 to 1000, inclusive. (Default: 10)
| space      | String| The space in which the IDs can be used to create new files. Supported values are 'drive' and 'appDataFolder'.

## GoogleDrive.getSingleFile
Gets a file's metadata or content by ID.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| fileId            | String | The ID of the file.
| acknowledgeAbuse  | Boolean| Whether the user is acknowledging the risk of downloading known malware or other abusive files. This is only applicable when alt=media. (Default: false)
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)

## GoogleDrive.getFiles
Lists or searches files.

| Field                | Type   | Description
|----------------------|--------|----------
| accessToken          | String | Access Token. Use getAccessToken to get it
| corpora              | String | Comma-separated list of bodies of items (files/documents) to which the query applies. Supported bodies are 'user', 'domain', 'teamDrive' and 'allTeamDrives'. 'allTeamDrives' must be combined with 'user'; all other values must be used in isolation. Prefer 'user' or 'teamDrive' to 'allTeamDrives' for efficiency.
| corpus               | String | The source of files to list. Deprecated: use 'corpora' instead. Acceptable values are: "domain": Files shared to the user's domain. "user": Files owned by or shared to the user.
| includeTeamDriveItems| Boolean| Whether Team Drive items should be included in results. (Default: false)
| orderBy              | String | A comma-separated list of sort keys. Valid keys are 'createdTime', 'folder', 'modifiedByMeTime', 'modifiedTime', 'name', 'quotaBytesUsed', 'recency', 'sharedWithMeTime', 'starred', and 'viewedByMeTime'. Each key sorts ascending by default, but may be reversed with the 'desc' modifier. Example usage: ?orderBy=folder,modifiedTime desc,name. Please note that there is a current limitation for users with approximately one million files in which the requested sort order is ignored.
| pageSize             | Number | The maximum number of files to return per page. Partial or empty result pages are possible even before the end of the files list has been reached. Acceptable values are 1 to 1000, inclusive. (Default: 100)
| pageToken            | String | The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| query                | String | A query for filtering the file results. See the "Search for Files" guide for supported syntax.
| spaces               | String | A comma-separated list of spaces to query within the corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
| supportsTeamDrives   | Boolean| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId          | String | ID of Team Drive to search

## GoogleDrive.updateFile
Updates a file's metadata and/or content with patch semantics

| Field                    | Type   | Description
|--------------------------|--------|----------
| accessToken              | String | Access Token. Use getAccessToken to get it
| fieldId                  | String | The ID of the file.
| uploadType               | String | The type of upload request to the /upload URI. Acceptable values are: "media" - Simple upload. Upload the media only, without any metadata. "multipart" - Multipart upload. Upload both the media and its metadata, in a single request. "resumable" - Resumable upload. Upload the file in a resumable fashion, using a series of at least two requests where the first request includes the metadata.
| addParents               | String | A comma-separated list of parent IDs to add.
| keepRevisionForever      | Boolean| Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage              | String | A language hint for OCR processing during image import (ISO 639-1 code).
| removeParents            | String | A comma-separated list of parent IDs to remove.
| supportsTeamDrives       | Boolean| Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText| Boolean| Whether to use the uploaded content as indexable text. (Default: false)
| appProperties            | JSON   | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| indexableText            | String | Text to be indexed for the file to improve fullText queries. This is limited to 128KB in length and may contain HTML elements.
| thumbnailImage           | String | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| mimeType                 | String | The MIME type of the thumbnail.
| description              | String | A short description of the file.
| folderColorRgb           | String | The color for a folder as an RGB hex string. The supported colors are published in the folderColorPalette field of the About resource. If an unsupported color is specified, the closest color in the palette will be used instead.
| mimeType                 | String | The MIME type of the file. Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded. If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime             | String | The last time the file was modified by anyone (RFC 3339 date-time). Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                     | String | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| originalFilename         | String | The original filename of the uploaded content if available, or else the original value of the name field. This is only available for files with binary content in Drive.
| properties               | JSON   | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                  | Boolean| Whether the user has starred the file.
| trashed                  | Boolean| Whether the file has been trashed, either explicitly or from a trashed parent folder. Only the owner may trash a file, and other users cannot see files in the owner's trash.
| viewedByMeTime           | String | The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent    | Boolean| Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare          | Boolean| Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.

## GoogleDrive.subscribeToFileChanges
Subscribes to changes to a file

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| fieldId           | String | The ID of the file.
| acknowledgeAbuse  | Boolean| Whether the user is acknowledging the risk of downloading known malware or other abusive files. This is only applicable when alt=media. (Default: false)
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)
| kind              | String | Identifies this as a notification channel used to watch for changes to a resource. Value: the fixed string "api#channel".
| id                | String | A UUID or similar unique string that identifies this channel.
| resourceId        | String | An opaque ID that identifies the resource being watched on this channel. Stable across different API versions.
| resourceUri       | String | A version-specific identifier for the watched resource.
| token             | String | An arbitrary string delivered to the target address with each notification delivered over this channel. Optional.
| expiration        | Number | Date and time of notification channel expiration, expressed as a Unix timestamp, in milliseconds. Optional.
| type              | String | The type of delivery mechanism used for this channel.
| address           | String | The address where notifications are delivered for this channel
| payload           | Boolean| A Boolean value to indicate whether payload is wanted.
| params            | JSON   | Additional parameters controlling delivery channel behavior (key:value)

## GoogleDrive.createFilePermission
Creates a permission for a file or Team Drive. 

| Field                | Type   | Description
|----------------------|--------|----------
| accessToken          | String | Access Token. Use getAccessToken to get it
| fieldId              | String | The ID of the file.
| emailMessage         | String | A custom message to include in the notification email.
| sendNotificationEmail| Boolean| Whether to send a notification email when sharing to users or groups. This defaults to true for users and groups, and is not allowed for other requests. It must not be disabled for ownership transfers.
| supportsTeamDrives   | Boolean| Whether the requesting application supports Team Drives. (Default: false)
| transferOwnership    | Boolean| Whether to transfer ownership to the specified user and downgrade the current owner to a writer. This parameter is required as an acknowledgement of the side effect. (Default: false)
| role                 | String | The role granted by this permission. While new values may be supported in the future, the following are currently allowed: "organizer", "owner", "writer", "commenter", "reader"
| type                 | String | he type of the grantee. Valid values are: "user", "group", "domain", "anyone"
| allowFileDiscovery   | Boolean| Whether the permission allows the file to be discovered through search. This is only applicable for permissions of type domain or anyone.
| domain               | String | The domain to which this permission refers.
| emailAddress         | String | The email address of the user or group to which this permission refers.

## GoogleDrive.deleteFilePermission
Deletes a permission.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| fieldId           | String | The ID of the file.
| permissionId      | String | The ID of the permission.
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)

## GoogleDrive.getFileSinglePermission
Gets a permission by ID.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| fieldId           | String | The ID of the file.
| permissionId      | String | The ID of the permission.
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)

## GoogleDrive.getFilePermissions
Lists a file's or Team Drive's permissions.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| fieldId           | String | The ID of the file.
| pageSize          | Number | The maximum number of permissions to return per page. When not set for files in a Team Drive, at most 100 results will be returned. When not set for files that are not in a Team Drive, the entire list will be returned. Acceptable values are 1 to 100, inclusive.
| pageToken         | String | The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)

## GoogleDrive.updateFilePermission
Updates a permission with patch semantics.

| Field             | Type   | Description
|-------------------|--------|----------
| accessToken       | String | Access Token. Use getAccessToken to get it
| fieldId           | String | The ID of the file.
| permissionId      | String | The ID of the permission.
| removeExpiration  | Boolean| Whether to remove the expiration date. (Default: false)
| supportsTeamDrives| Boolean| Whether the requesting application supports Team Drives. (Default: false)
| transferOwnership | Boolean| Whether to transfer ownership to the specified user and downgrade the current owner to a writer. This parameter is required as an acknowledgement of the side effect. (Default: false)
| expirationTime    | Number | The time at which this permission will expire (RFC 3339 date-time). Expiration times have the following restrictions: They can only be set on user and group permissions. The time must be in the future. The time cannot be more than a year in the future
| role              | String | The role granted by this permission. While new values may be supported in the future, the following are currently allowed: "organizer", "owner", "writer", "commenter", "reader"

## GoogleDrive.createReplyToComment
Creates a new reply to a comment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fieldId    | String| The ID of the file.
| commentId  | String| The ID of the comment.
| action     | String| The action the reply performed to the parent comment. Valid values are:, "resolve", "reopen"
| content    | String| The plain text content of the reply. This field is used for setting the content, while htmlContent should be displayed. This is required on creates if no action is specified.

## GoogleDrive.deleteCommentReply
Deletes a reply.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fieldId    | String| The ID of the file.
| commentId  | String| The ID of the comment.
| replyId    | String| The ID of the reply.

## GoogleDrive.getSingleReply
Gets a reply by ID.

| Field         | Type   | Description
|---------------|--------|----------
| accessToken   | String | Access Token. Use getAccessToken to get it
| fieldId       | String | The ID of the file.
| commentId     | String | The ID of the comment.
| replyId       | String | The ID of the reply.
| includeDeleted| Boolean| Whether to return deleted replies. Deleted replies will not include their original content. (Default: false)

## GoogleDrive.getCommentReplies
Lists a comment's replies.

| Field         | Type   | Description
|---------------|--------|----------
| accessToken   | String | Access Token. Use getAccessToken to get it
| fieldId       | String | The ID of the file.
| commentId     | String | The ID of the comment.
| includeDeleted| Boolean| Whether to return deleted replies. Deleted replies will not include their original content. (Default: false)
| pageSize      | Number | The maximum number of replies to return per page. Acceptable values are 1 to 100, inclusive. (Default: 20)
| pageToken     | String | The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.

## GoogleDrive.updateCommentReply
Updates a reply with patch semantics.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fieldId    | String| The ID of the file.
| commentId  | String| The ID of the comment.
| replyId    | String| The ID of the reply.
| content    | String| The plain text content of the reply. This field is used for setting the content, while htmlContent should be displayed. This is required on creates if no action is specified.

## GoogleDrive.deleteFileRevision
Permanently deletes a revision. This method is only applicable to files with binary content in Drive.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fieldId    | String| The ID of the file.
| revisionId | String| The ID of the revision.

## GoogleDrive.getFileSingleRevision
Gets a revision's metadata or content by ID.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fieldId    | String| The ID of the file.
| revisionId | String| The ID of the revision.

## GoogleDrive.getFileRevisions
Lists a file's revisions.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fieldId    | String| The ID of the file.
| pageSize   | Number| The maximum number of revisions to return per page. Acceptable values are 1 to 1000, inclusive. (Default: 200)
| pageToken  | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.

## GoogleDrive.updateFileRevision
Updates a revision with patch semantics.

| Field                 | Type   | Description
|-----------------------|--------|----------
| accessToken           | String | Access Token. Use getAccessToken to get it
| fieldId               | String | The ID of the file.
| revisionId            | String | The ID of the revision.
| keepForever           | Boolean| Whether to keep this revision forever, even if it is no longer the head revision. If not set, the revision will be automatically purged 30 days after newer content is uploaded. This can be set on a maximum of 200 revisions for a file. This field is only applicable to files with binary content in Drive.
| publishAuto           | Boolean| Whether subsequent revisions will be automatically republished. This is only applicable to Google Docs.
| published             | Boolean| Whether this revision is published. This is only applicable to Google Docs.
| publishedOutsideDomain| Boolean| Whether this revision is published outside the domain. This is only applicable to Google Docs.

## GoogleDrive.createTeamDrive
Creates a new Team Drive.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| requestId  | String| An ID, such as a random UUID, which uniquely identifies this user's request for idempotent creation of a Team Drive. A repeated request by the same user and with the same request ID will avoid creating duplicates by attempting to create the same Team Drive. If the Team Drive already exists a 409 error will be returned.
| themeId    | String| The ID of the theme from which the background image and color will be set. The set of possible teamDriveThemes can be retrieved from a drive.about.get response. When not specified on a drive.teamdrives.create request, a random theme is chosen from which the background image and color are set. This is a write-only field; it can only be set on requests that don't set colorRgb or backgroundImageFile.

## GoogleDrive.deleteTeamDrive
Permanently deletes a Team Drive for which the user is an organizer. The Team Drive cannot contain any untrashed items.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| teamDriveId| String| The ID of the Team Drive

## GoogleDrive.getSingleTeamDrive
Gets a Team Drive's metadata by ID.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| teamDriveId| String| The ID of the Team Drive

## GoogleDrive.getTeamDrives
Lists the user's Team Drives.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| pageSize   | Number| Maximum number of Team Drives to return. Acceptable values are 1 to 100, inclusive. (Default: 10)
| pageToken  | String| Page token for Team Drives.

## GoogleDrive.updateTeamDrive
Updates a Team Drive's metadata

| Field                         | Type  | Description
|-------------------------------|-------|----------
| accessToken                   | String| Access Token. Use getAccessToken to get it
| teamDriveId                   | String| The ID of the Team Drive
| backgroundImageFileId         | String| Id of image file. If set also set "backgroundImageFileWidth", "backgroundImageFileXCoordinate", "backgroundImageFileYCoordinate"
| backgroundImageFileWidth      | Number| Width of image file. If set also set "backgroundImageFileId", "backgroundImageFileXCoordinate", "backgroundImageFileYCoordinate"
| backgroundImageFileXCoordinate| Number| xCoordinate of image file. If set also set "backgroundImageFileId", "backgroundImageFileWidth", "backgroundImageFileYCoordinate"
| backgroundImageFileYCoordinate| Number| xCoordinate of image file. If set also set "backgroundImageFileId", "backgroundImageFileWidth", "backgroundImageFileXCoordinate"
| colorRgb                      | String| The color of this Team Drive as an RGB hex string. It can only be set on a drive.teamdrives.update request that does not set themeId.
| themeId                       | String| The ID of the theme from which the background image and color will be set. The set of possible teamDriveThemes can be retrieved from a drive.about.get response. When not specified on a drive.teamdrives.create request, a random theme is chosen from which the background image and color are set. This is a write-only field; it can only be set on requests that don't set colorRgb or backgroundImageFile.

## GoogleDrive.refreshAccessToken
Updates a Team Drive's metadata

| Field                         | Type  | Description
|-------------------------------|-------|----------
| accessToken                   | String| Access Token. Use getAccessToken to get it
| teamDriveId                   | String| The ID of the Team Drive
| backgroundImageFileId         | String| Id of image file. If set also set "backgroundImageFileWidth", "backgroundImageFileXCoordinate", "backgroundImageFileYCoordinate"
| backgroundImageFileWidth      | Number| Width of image file. If set also set "backgroundImageFileId", "backgroundImageFileXCoordinate", "backgroundImageFileYCoordinate"
| backgroundImageFileXCoordinate| Number| xCoordinate of image file. If set also set "backgroundImageFileId", "backgroundImageFileWidth", "backgroundImageFileYCoordinate"
| backgroundImageFileYCoordinate| Number| xCoordinate of image file. If set also set "backgroundImageFileId", "backgroundImageFileWidth", "backgroundImageFileXCoordinate"
| colorRgb                      | String| The color of this Team Drive as an RGB hex string. It can only be set on a drive.teamdrives.update request that does not set themeId.
| themeId                       | String| The ID of the theme from which the background image and color will be set. The set of possible teamDriveThemes can be retrieved from a drive.about.get response. When not specified on a drive.teamdrives.create request, a random theme is chosen from which the background image and color are set. This is a write-only field; it can only be set on requests that don't set colorRgb or backgroundImageFile.

