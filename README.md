[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/GoogleDrive/functions?utm_source=RapidAPIGitHub_GoogleDriveFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# GoogleDrive Package
Read, write, and sync files stored in Google Drive from your mobile and web apps.
* Domain: [GoogleDrive](https://www.google.com/drive/)
* Credentials: clientId, clientSecret

## How to get credentials: 
1. When you create your application, you register it using the Google API Console. Google then provides information you'll need later, such as a client ID and a client secret.
2. Activate the Drive API in the Google API Console. (If the API isn't listed in the API Console, then skip this step.)
3. When your application needs access to user data, it asks Google for a particular scope of access.
4. Google displays a consent screen to the user, asking them to authorize your application to request some of their data.
5. If the user approves, then Google gives your application a short-lived access token.

 
 ## Custom datatypes: 
  |Datatype|Description|Example
  |--------|-----------|----------
  |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
  |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
  |List|Simple array|```["123", "sample"]``` 
  |Select|String with predefined values|```sample```
  |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## GoogleDrive.getAccessToken
Get AccessToken.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client ID
| clientSecret| credentials| Client secret
| code        | String     | Code you received from Google after the user granted access
| redirectUri | String     | The same redirect URL as in received Code step.

## GoogleDrive.refreshToken
Get new accessToken by refreshToken.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client ID
| clientSecret| credentials| Client secret
| refreshToken| String     | A token that you can use to obtain a new access token. Refresh tokens are valid until the user revokes access. Again, this field is only present in this response if you set the access_type parameter to offline in the initial request to Google's authorization server.

## GoogleDrive.revokeAccessToken
In some cases a user may wish to revoke access given to an application. A user can revoke access by visiting Account Settings. It is also possible for an application to programmatically revoke the access given to it. Programmatic revocation is important in instances where a user unsubscribes or removes an application. In other words, part of the removal process can include an API request to ensure the permissions granted to the application are removed.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The token can be an access token or a refresh token. If the token is an access token and it has a corresponding refresh token, the refresh token will also be revoked.

## GoogleDrive.getMe
Gets information about the user, the user's Drive, and system capabilities.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getStartPageToken
Gets the starting pageToken for listing future changes.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Access Token. Use getAccessToken to get it
| supportsTeamDrives| Select| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId       | String| The ID of the Team Drive for which the starting pageToken for listing future changes from that Team Drive will be returned.
| fields            | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getChanges
Lists the changes for a user or Team Drive.

| Field                | Type  | Description
|----------------------|-------|----------
| accessToken          | String| Access Token. Use getAccessToken to get it
| pageToken            | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response or to the response from the getStartPageToken method.
| includeCorpusRemovals| Select| Whether changes should include the file resource if the file is still accessible by the user at the time of the request, even when a file was removed from the list of changes and there will be no further change entries for this file. (Default: false)
| includeRemoved       | Select| Whether to include changes indicating that items have been removed from the list of changes, for example by deletion or loss of access. (Default: true)
| includeTeamDriveItems| Select| Whether Team Drive files or changes should be included in results. (Default: false)
| pageSize             | Number| The maximum number of changes to return per page. Acceptable values are 1 to 1000, inclusive. (Default: 100)
| restrictToMyDrive    | Select| Whether to restrict the results to changes inside the My Drive hierarchy. This omits changes to files such as those in the Application Data folder or shared files which have not been added to My Drive. (Default: false)
| spaces               | List  | A comma-separated list of spaces to query within the user corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
| supportsTeamDrives   | Select| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId          | String| The Team Drive from which changes will be returned. If specified the change IDs will be reflective of the Team Drive; use the combined Team Drive ID and change ID as an identifier.
| fields               | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.subscribeToUserChanges
Subscribes to changes for a user.

| Field                | Type  | Description
|----------------------|-------|----------
| accessToken          | String| Access Token. Use getAccessToken to get it
| pageToken            | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response or to the response from the getStartPageToken method.
| includeCorpusRemovals| Select| Whether changes should include the file resource if the file is still accessible by the user at the time of the request, even when a file was removed from the list of changes and there will be no further change entries for this file. (Default: false)
| includeRemoved       | Select| Whether to include changes indicating that items have been removed from the list of changes, for example by deletion or loss of access. (Default: true)
| includeTeamDriveItems| Select| Whether Team Drive files or changes should be included in results. (Default: false)
| pageSize             | Number| The maximum number of changes to return per page. Acceptable values are 1 to 1000, inclusive. (Default: 100)
| restrictToMyDrive    | Select| Whether to restrict the results to changes inside the My Drive hierarchy. This omits changes to files such as those in the Application Data folder or shared files which have not been added to My Drive. (Default: false)
| spaces               | List  | A comma-separated list of spaces to query within the user corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
| supportsTeamDrives   | Select| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId          | String| The Team Drive from which changes will be returned. If specified the change IDs will be reflective of the Team Drive; use the combined Team Drive ID and change ID as an identifier.
| fields               | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.stopWatchingChannelResources
Stop watching resources through this channel.

| Field      | Type      | Description
|------------|-----------|----------
| accessToken| String    | Access Token. Use getAccessToken to get it
| kind       | String    | Identifies this as a notification channel used to watch for changes to a resource. Value: the fixed string "api#channel".
| id         | String    | A UUID or similar unique string that identifies this channel.
| resourceId | String    | An opaque ID that identifies the resource being watched on this channel. Stable across different API versions.
| resourceUri| String    | A version-specific identifier for the watched resource.
| token      | String    | An arbitrary string delivered to the target address with each notification delivered over this channel. Optional.
| expiration | DatePicker| Date and time of notification channel expiration, expressed as a Unix timestamp, in milliseconds. Optional.
| type       | String    | The type of delivery mechanism used for this channel.
| address    | String    | The address where notifications are delivered for this channel.
| payload    | Select    | A Boolean value to indicate whether payload is wanted. Optional.
| params     | Array     | Additional parameters controlling delivery channel behavior. Optional.
| fields     | List      | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.createFileComment
Creates a new comment on a file.

| Field                    | Type  | Description
|--------------------------|-------|----------
| accessToken              | String| Access Token. Use getAccessToken to get it
| fileId                   | String| The ID of the file.
| content                  | String| The plain text content of the comment. This field is used for setting the content, while htmlContent should be displayed.
| anchor                   | String| A region of the document represented as a JSON string. See anchor documentation for details on how to define and interpret anchor properties.
| quotedFileContentValue   | String| The quoted content itself. This is interpreted as plain text if set through the API.
| quotedFileContentMimeType| String| The quoted content itself. This is interpreted as plain text if set through the API.
| fields                   | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.deleteFileComment
Deletes a comment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| commentId  | String| The ID of the comment.

## GoogleDrive.getFileSingleComment
Gets a comment by ID.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access Token. Use getAccessToken to get it
| fileId        | String| The ID of the file.
| commentId     | String| The ID of the comment.
| includeDeleted| Select| Whether to return deleted comments. Deleted comments will not include their original content. (Default: false)
| fields        | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getFileComments
Lists a file's comments.

| Field            | Type  | Description
|------------------|-------|----------
| accessToken      | String| Access Token. Use getAccessToken to get it
| fileId           | String| The ID of the file.
| includeDeleted   | Select| Whether to include deleted comments. Deleted comments will not include their original content. (Default: false)
| pageSize         | Number| The maximum number of comments to return per page. Acceptable values are 1 to 100, inclusive. (Default: 20)
| pageToken        | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| startModifiedTime| String| The minimum value of 'modifiedTime' for the result comments (RFC 3339 date-time).
| fields           | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.updateFileComment
Updates a comment with patch semantics.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| commentId  | String| The ID of the comment.
| content    | String| The plain text content of the comment. This field is used for setting the content, while htmlContent should be displayed.
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.copyFile
Lists a file's comments.

| Field                        | Type      | Description
|------------------------------|-----------|----------
| accessToken                  | String    | Access Token. Use getAccessToken to get it
| fileId                       | String    | The ID of the file.
| ignoreDefaultVisibility      | Select    | Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever          | Select    | Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage                  | String    | A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives           | Select    | Whether the requesting application supports Team Drives. (Default: false)
| appProperties                | Array     | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| contentHintsThumbnailImage   | String    | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| contentHintsThumbnailMimeType| String    | The MIME type of the thumbnail.
| description                  | String    | A short description of the file.
| mimeType                     | String    | The MIME type of the file. Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded. If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime                 | DatePicker| The last time the file was modified by anyone (RFC 3339 date-time). Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                         | String    | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| parents                      | List      | The IDs of the parent folders which contain the file. If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| properties                   | Array     | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                      | Select    | Whether the user has starred the file.
| viewedByMeTime               | DatePicker| The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent        | Select    | Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare              | Select    | Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.
| fields                       | List      | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.createFileFromUpload
 A createFileFromUpload is the most straightforward method for uploading a file.

| Field                    | Type  | Description
|--------------------------|-------|----------
| accessToken              | String| Access Token. Use getAccessToken to get it
| uploadFile               | File  | Upload file.
| contentType              | String| Set to the MIME media type of the object being uploaded.
| ignoreDefaultVisibility  | Select| Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever      | Select| Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage              | String| A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives       | Select| Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText| Select| Whether to use the uploaded content as indexable text. (Default: false)

## GoogleDrive.updateFileFromUpload
A updateFileFromUpload is the most straightforward method for updating a file .

| Field                    | Type  | Description
|--------------------------|-------|----------
| accessToken              | String| Access Token. Use getAccessToken to get it
| fileId                   | String| The ID of the file.
| uploadFile               | File  | Upload file.
| contentType              | String| Set to the MIME media type of the object being uploaded.
| ignoreDefaultVisibility  | Select| Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever      | Select| Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage              | String| A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives       | Select| Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText| Select| Whether to use the uploaded content as indexable text. (Default: false)

## GoogleDrive.updateFileFromMultipartData
A updateFileFromMultipartData is the most straightforward method for updating a file.

| Field                     | Type      | Description
|---------------------------|-----------|----------
| accessToken               | String    | Access Token. Use getAccessToken to get it
| fileId                    | String    | The ID of the file.
| uploadFile                | File      | Upload file.
| contentType               | String    | Set to the MIME media type of the object being uploaded.
| ignoreDefaultVisibility   | Select    | Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever       | Select    | Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage               | String    | A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives        | Select    | Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText | Select    | Whether to use the uploaded content as indexable text. (Default: false)
| appProperties             | Array     | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| contentHintsIndexableText | String    | Text to be indexed for the file to improve fullText queries. This is limited to 128KB in length and may contain HTML elements.
| contentHintsThumbnailImage| String    | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| contentHintsMimeType      | String    | The MIME type of the thumbnail.
| description               | String    | A short description of the file.
| folderColorRgb            | String    | The color for a folder as an RGB hex string. The supported colors are published in the folderColorPalette field of the About resource.If an unsupported color is specified, the closest color in the palette will be used instead.
| id                        | String    | The ID of the file.
| mimeType                  | String    | The MIME type of the file.Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded.If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime              | DatePicker| The last time the file was modified by anyone (RFC 3339 date-time).Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                      | String    | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| originalFilename          | String    | The original filename of the uploaded content if available, or else the original value of the name field. This is only available for files with binary content in Drive.
| parents                   | List      | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| properties                | Array     | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                   | Select    | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| viewedByMeTime            | DatePicker| The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent     | Select    | Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare           | Select    | Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.

## GoogleDrive.updateFileFromMetadata
A updateFileFromMetadata is the most straightforward method for updating a metadata file.

| Field                     | Type      | Description
|---------------------------|-----------|----------
| accessToken               | String    | Access Token. Use getAccessToken to get it
| fileId                    | String    | The ID of the file.
| ignoreDefaultVisibility   | Select    | Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever       | Select    | Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage               | String    | A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives        | Select    | Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText | Select    | Whether to use the uploaded content as indexable text. (Default: false)
| appProperties             | Array     | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| contentHintsIndexableText | String    | Text to be indexed for the file to improve fullText queries. This is limited to 128KB in length and may contain HTML elements.
| contentHintsThumbnailImage| String    | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| contentHintsMimeType      | String    | The MIME type of the thumbnail.
| description               | String    | A short description of the file.
| folderColorRgb            | String    | The color for a folder as an RGB hex string. The supported colors are published in the folderColorPalette field of the About resource.If an unsupported color is specified, the closest color in the palette will be used instead.
| id                        | String    | The ID of the file.
| mimeType                  | String    | The MIME type of the file.Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded.If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime              | DatePicker| The last time the file was modified by anyone (RFC 3339 date-time).Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                      | String    | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| originalFilename          | String    | The original filename of the uploaded content if available, or else the original value of the name field. This is only available for files with binary content in Drive.
| parents                   | List      | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| properties                | Array     | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                   | Select    | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| viewedByMeTime            | DatePicker| The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent     | Select    | Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare           | Select    | Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.

## GoogleDrive.createFileFromMetadata
Creates a new file from metadata.For metadata-only requests.

| Field                     | Type      | Description
|---------------------------|-----------|----------
| accessToken               | String    | Access Token. Use getAccessToken to get it
| ignoreDefaultVisibility   | Select    | Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| keepRevisionForever       | Select    | Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage               | String    | A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives        | Select    | Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText | Select    | Whether to use the uploaded content as indexable text. (Default: false)
| appProperties             | Array     | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| contentHintsIndexableText | String    | Text to be indexed for the file to improve fullText queries. This is limited to 128KB in length and may contain HTML elements.
| contentHintsThumbnailImage| String    | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| contentHintsMimeType      | String    | The MIME type of the thumbnail.
| description               | String    | A short description of the file.
| folderColorRgb            | String    | The color for a folder as an RGB hex string. The supported colors are published in the folderColorPalette field of the About resource.If an unsupported color is specified, the closest color in the palette will be used instead.
| id                        | String    | The ID of the file.
| mimeType                  | String    | The MIME type of the file.Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded.If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime              | DatePicker| The last time the file was modified by anyone (RFC 3339 date-time).Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                      | String    | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| originalFilename          | String    | The original filename of the uploaded content if available, or else the original value of the name field. This is only available for files with binary content in Drive.
| parents                   | List      | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| properties                | Array     | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                   | Select    | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| viewedByMeTime            | DatePicker| The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent     | Select    | Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare           | Select    | Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.

## GoogleDrive.createFileFromMultipartData
Creates a new file from upload data/metadata.Maximum file size: 5120GB.

| Field                     | Type      | Description
|---------------------------|-----------|----------
| accessToken               | String    | Access Token. Use getAccessToken to get it
| uploadFile                | File      | Upload file.
| ignoreDefaultVisibility   | Select    | Whether to ignore the domain's default visibility settings for the created file. Domain administrators can choose to make all uploaded files visible to the domain by default; this parameter bypasses that behavior for the request. Permissions are still inherited from parent folders. (Default: false)
| contentType               | String    | Set to the MIME media type of the object being uploaded.
| keepRevisionForever       | Select    | Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage               | String    | A language hint for OCR processing during image import (ISO 639-1 code).
| supportsTeamDrives        | Select    | Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText | Select    | Whether to use the uploaded content as indexable text. (Default: false)
| appProperties             | Array     | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| contentHintsIndexableText | String    | Text to be indexed for the file to improve fullText queries. This is limited to 128KB in length and may contain HTML elements.
| contentHintsThumbnailImage| String    | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| contentHintsMimeType      | String    | The MIME type of the thumbnail.
| description               | String    | A short description of the file.
| folderColorRgb            | String    | The color for a folder as an RGB hex string. The supported colors are published in the folderColorPalette field of the About resource.If an unsupported color is specified, the closest color in the palette will be used instead.
| id                        | String    | The ID of the file.
| mimeType                  | String    | The MIME type of the file.Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded.If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime              | DatePicker| The last time the file was modified by anyone (RFC 3339 date-time).Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                      | String    | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| originalFilename          | String    | The original filename of the uploaded content if available, or else the original value of the name field. This is only available for files with binary content in Drive.
| parents                   | List      | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| properties                | Array     | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                   | Select    | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| viewedByMeTime            | DatePicker| The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent     | Select    | Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare           | Select    | Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.

## GoogleDrive.deleteFile
Permanently deletes a file owned by the user without moving it to the trash. If the file belongs to a Team Drive the user must be an organizer on the parent. If the target is a folder, all descendants owned by the user are also deleted.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Access Token. Use getAccessToken to get it.
| fileId            | String| The ID of the file.
| supportsTeamDrives| Select| Whether the requesting application supports Team Drives. (Default: false)

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

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Access Token. Use getAccessToken to get it
| fileId            | String| The ID of the file.
| acknowledgeAbuse  | Select| Whether the user is acknowledging the risk of downloading known malware or other abusive files. This is only applicable when alt=media. (Default: false)
| supportsTeamDrives| Select| Whether the requesting application supports Team Drives. (Default: false)
| fields            | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getFiles
Lists or searches files.

| Field                | Type  | Description
|----------------------|-------|----------
| accessToken          | String| Access Token. Use getAccessToken to get it
| corpora              | List  | Comma-separated list of bodies of items (files/documents) to which the query applies. Supported bodies are 'user', 'domain', 'teamDrive' and 'allTeamDrives'. 'allTeamDrives' must be combined with 'user'; all other values must be used in isolation. Prefer 'user' or 'teamDrive' to 'allTeamDrives' for efficiency.
| corpus               | Select| The source of files to list. Deprecated: use 'corpora' instead. Acceptable values are: "domain": Files shared to the user's domain. "user": Files owned by or shared to the user.
| includeTeamDriveItems| Select| Whether Team Drive items should be included in results. (Default: false)
| orderBy              | List  | A comma-separated list of sort keys. Valid keys are 'createdTime', 'folder', 'modifiedByMeTime', 'modifiedTime', 'name', 'quotaBytesUsed', 'recency', 'sharedWithMeTime', 'starred', and 'viewedByMeTime'. Each key sorts ascending by default, but may be reversed with the 'desc' modifier. Example usage: ?orderBy=folder,modifiedTime desc,name. Please note that there is a current limitation for users with approximately one million files in which the requested sort order is ignored.
| pageSize             | Number| The maximum number of files to return per page. Partial or empty result pages are possible even before the end of the files list has been reached. Acceptable values are 1 to 1000, inclusive. (Default: 100)
| pageToken            | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| query                | String| A query for filtering the file results. See the "Search for Files" guide for supported syntax.
| spaces               | List  | A comma-separated list of spaces to query within the user corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
| supportsTeamDrives   | Select| Whether the requesting application supports Team Drives. (Default: false)
| teamDriveId          | String| ID of Team Drive to search
| fields               | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.updateMultipartFile
Updates a file's metadata and/or content with patch semantics.

| Field                     | Type      | Description
|---------------------------|-----------|----------
| accessToken               | String    | Access Token. Use getAccessToken to get it
| fileId                    | String    | The ID of the file.
| addParents                | List      | A comma-separated list of parent IDs to add.
| contentType               | String    | Set to the MIME media type of the object being uploaded.
| uploadFile                | File      | Upload file.
| keepRevisionForever       | Select    | Whether to set the 'keepForever' field in the new head revision. This is only applicable to files with binary content in Drive. (Default: false)
| ocrLanguage               | String    | A language hint for OCR processing during image import (ISO 639-1 code).
| removeParents             | List      | A comma-separated list of parent IDs to remove.
| supportsTeamDrives        | Select    | Whether the requesting application supports Team Drives. (Default: false)
| useContentAsIndexableText | Select    | Whether to use the uploaded content as indexable text. (Default: false)
| appProperties             | Array     | A collection of arbitrary key-value pairs which are private to the requesting app. Entries with null values are cleared in update and copy requests.
| contentHintsIndexableText | String    | Text to be indexed for the file to improve fullText queries. This is limited to 128KB in length and may contain HTML elements.
| contentHintsThumbnailImage| String    | The thumbnail data encoded with URL-safe Base64 (RFC 4648 section 5).
| contentHintsMimeType      | String    | The MIME type of the thumbnail.
| description               | String    | A short description of the file.
| mimeType                  | String    | The MIME type of the file.Drive will attempt to automatically detect an appropriate value from uploaded content if no value is provided. The value cannot be changed unless a new revision is uploaded.If a file is created with a Google Doc MIME type, the uploaded content will be imported if possible. The supported import formats are published in the About resource.
| modifiedTime              | DatePicker| The last time the file was modified by anyone (RFC 3339 date-time).Note that setting modifiedTime will also update modifiedByMeTime for the user.
| name                      | String    | The name of the file. This is not necessarily unique within a folder. Note that for immutable items such as the top level folders of Team Drives, My Drive root folder, and Application Data folder the name is constant.
| originalFilename          | String    | The original filename of the uploaded content if available, or else the original value of the name field. This is only available for files with binary content in Drive.
| parents                   | List      | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| properties                | Array     | A collection of arbitrary key-value pairs which are visible to all apps. Entries with null values are cleared in update and copy requests.
| starred                   | Select    | The IDs of the parent folders which contain the file.If not specified as part of a create request, the file will be placed directly in the My Drive folder. Update requests must use the addParents and removeParents parameters to modify the values.
| viewedByMeTime            | DatePicker| The last time the file was viewed by the user (RFC 3339 date-time).
| viewersCanCopyContent     | Select    | Whether users with only reader or commenter permission can copy the file's content. This affects copy, download, and print operations.
| writersCanShare           | Select    | Whether users with only writer permission can modify the file's permissions. Not populated for Team Drive files.

## GoogleDrive.subscribeToFileChanges
Subscribes to changes to a file.

| Field             | Type      | Description
|-------------------|-----------|----------
| accessToken       | String    | Access Token. Use getAccessToken to get it
| fileId            | String    | The ID of the file.
| acknowledgeAbuse  | Select    | Whether the user is acknowledging the risk of downloading known malware or other abusive files. This is only applicable when alt=media. (Default: false)
| supportsTeamDrives| Select    | Whether the requesting application supports Team Drives. (Default: false)
| kind              | String    | Identifies this as a notification channel used to watch for changes to a resource. Value: the fixed string "api#channel".
| id                | String    | A UUID or similar unique string that identifies this channel.
| resourceId        | String    | An opaque ID that identifies the resource being watched on this channel. Stable across different API versions.
| resourceUri       | String    | A version-specific identifier for the watched resource.
| token             | String    | An arbitrary string delivered to the target address with each notification delivered over this channel. Optional.
| expiration        | DatePicker| Date and time of notification channel expiration, expressed as a Unix timestamp, in milliseconds. Optional.
| type              | String    | The type of delivery mechanism used for this channel.
| address           | String    | The address where notifications are delivered for this channel
| payload           | Select    | A Boolean value to indicate whether payload is wanted.
| params            | Array     | Additional parameters controlling delivery channel behavior. Optional.
| fields            | List      | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.createFilePermission
Creates a permission for a file or Team Drive.

| Field                | Type  | Description
|----------------------|-------|----------
| accessToken          | String| Access Token. Use getAccessToken to get it
| fileId               | String| The ID of the file.
| emailMessage         | String| A custom message to include in the notification email.
| sendNotificationEmail| Select| Whether to send a notification email when sharing to users or groups. This defaults to true for users and groups, and is not allowed for other requests. It must not be disabled for ownership transfers.
| supportsTeamDrives   | Select| Whether the requesting application supports Team Drives. (Default: false)
| transferOwnership    | Select| Whether to transfer ownership to the specified user and downgrade the current owner to a writer. This parameter is required as an acknowledgement of the side effect. (Default: false)
| role                 | Select| The role granted by this permission. While new values may be supported in the future, the following are currently allowed: "organizer", "owner", "writer", "commenter", "reader"
| type                 | Select| The type of the grantee. Valid values are: "user", "group", "domain", "anyone"
| allowFileDiscovery   | Select| Whether the permission allows the file to be discovered through search. This is only applicable for permissions of type domain or anyone.
| domain               | String| The domain to which this permission refers.
| emailAddress         | String| The email address of the user or group to which this permission refers.
| fields               | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.deleteFilePermission
Deletes a permission.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Access Token. Use getAccessToken to get it
| fileId            | String| The ID of the file.
| permissionId      | String| The ID of the permission.
| supportsTeamDrives| Select| Whether the requesting application supports Team Drives. (Default: false)

## GoogleDrive.getFileSinglePermission
Gets a permission by ID.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Access Token. Use getAccessToken to get it
| fileId            | String| The ID of the file.
| permissionId      | String| The ID of the permission.
| supportsTeamDrives| Select| Whether the requesting application supports Team Drives. (Default: false)
| fields            | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getFilePermissions
Lists a file's or Team Drive's permissions.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Access Token. Use getAccessToken to get it
| fileId            | String| The ID of the file.
| permissionId      | String| The permissionId of the file.
| pageSize          | Number| The maximum number of permissions to return per page. When not set for files in a Team Drive, at most 100 results will be returned. When not set for files that are not in a Team Drive, the entire list will be returned. Acceptable values are 1 to 100, inclusive.
| pageToken         | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| supportsTeamDrives| Select| Whether the requesting application supports Team Drives. (Default: false)
| kind              | String| Identifies what kind of resource this is. Value: the fixed string `drive#permissionList`.
| permissions       | List  | The list of permissions. If nextPageToken is populated, then this list may be incomplete and an additional page of results should be fetched.
| nextPageToken     | String| The page token for the next page of permissions. This field will be absent if the end of the permissions list has been reached. If the token is rejected for any reason, it should be discarded, and pagination should be restarted from the first page of results.
| fields            | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.updateFilePermission
Updates a permission with patch semantics.

| Field             | Type      | Description
|-------------------|-----------|----------
| accessToken       | String    | Access Token. Use getAccessToken to get it
| fileId            | String    | The ID of the file.
| permissionId      | String    | The ID of the permission.
| removeExpiration  | Select    | Whether to remove the expiration date. (Default: false)
| supportsTeamDrives| Select    | Whether the requesting application supports Team Drives. (Default: false)
| transferOwnership | Select    | Whether to transfer ownership to the specified user and downgrade the current owner to a writer. This parameter is required as an acknowledgement of the side effect. (Default: false)
| expirationTime    | DatePicker| The time at which this permission will expire (RFC 3339 date-time). Expiration times have the following restrictions: They can only be set on user and group permissions. The time must be in the future. The time cannot be more than a year in the future
| role              | Select    | The role granted by this permission. While new values may be supported in the future, the following are currently allowed: "organizer", "owner", "writer", "commenter", "reader"

## GoogleDrive.createReplyToComment
Creates a new reply to a comment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| commentId  | String| The ID of the comment.
| action     | Select| The action the reply performed to the parent comment. Valid values are:, "resolve", "reopen"
| content    | String| The plain text content of the reply. This field is used for setting the content, while htmlContent should be displayed. This is required on creates if no action is specified.
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.deleteCommentReply
Deletes a reply.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| commentId  | String| The ID of the comment.
| replyId    | String| The ID of the reply.
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getSingleReply
Gets a reply by ID.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access Token. Use getAccessToken to get it
| fileId        | String| The ID of the file.
| commentId     | String| The ID of the comment.
| replyId       | String| The ID of the reply.
| includeDeleted| Select| Whether to return deleted replies. Deleted replies will not include their original content. (Default: false)
| fields        | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getCommentReplies
Lists a comment's replies.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access Token. Use getAccessToken to get it
| fileId        | String| The ID of the file.
| commentId     | String| The ID of the comment.
| includeDeleted| Select| Whether to return deleted replies. Deleted replies will not include their original content. (Default: false)
| pageSize      | Number| The maximum number of replies to return per page. Acceptable values are 1 to 100, inclusive. (Default: 20)
| pageToken     | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| fields        | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.updateCommentReply
Updates a reply with patch semantics.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| commentId  | String| The ID of the comment.
| replyId    | String| The ID of the reply.
| content    | String| The plain text content of the reply. This field is used for setting the content, while htmlContent should be displayed. This is required on creates if no action is specified.

## GoogleDrive.deleteFileRevision
Permanently deletes a revision. This method is only applicable to files with binary content in Drive.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| revisionId | String| The ID of the revision.
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getFileSingleRevision
Gets a revision's metadata or content by ID.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Access Token. Use getAccessToken to get it
| fileId          | String| The ID of the file.
| revisionId      | String| The ID of the revision.
| acknowledgeAbuse| Select| Whether the user is acknowledging the risk of downloading known malware or other abusive files. This is only applicable when alt=media. (Default: false)
| fields          | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getFileRevisions
Lists a file's revisions.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| fileId     | String| The ID of the file.
| pageSize   | Number| The maximum number of revisions to return per page. Acceptable values are 1 to 1000, inclusive. (Default: 200)
| pageToken  | String| The token for continuing a previous list request on the next page. This should be set to the value of 'nextPageToken' from the previous response.
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.updateFileRevision
Updates a revision with patch semantics.

| Field                 | Type  | Description
|-----------------------|-------|----------
| accessToken           | String| Access Token. Use getAccessToken to get it
| fileId                | String| The ID of the file.
| revisionId            | String| The ID of the revision.
| keepForever           | Select| Whether to keep this revision forever, even if it is no longer the head revision. If not set, the revision will be automatically purged 30 days after newer content is uploaded. This can be set on a maximum of 200 revisions for a file. This field is only applicable to files with binary content in Drive.
| publishAuto           | Select| Whether subsequent revisions will be automatically republished. This is only applicable to Google Docs.
| published             | Select| Whether this revision is published. This is only applicable to Google Docs.
| publishedOutsideDomain| Select| Whether this revision is published outside the domain. This is only applicable to Google Docs.
| fields                | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

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
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.getTeamDrives
Lists the user's Team Drives.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it
| pageSize   | Number| Maximum number of Team Drives to return. Acceptable values are 1 to 100, inclusive. (Default: 10)
| pageToken  | String| Page token for Team Drives.
| fields     | List  | List of fields. Examples: kind, user, storageQuota, importFormats, exportFormats, maxImportSizes, maxUploadSize, appInstalled, folderColorPalette, teamDriveThemes

## GoogleDrive.updateTeamDrive
Updates a Team Drive's metadata.

| Field                         | Type  | Description
|-------------------------------|-------|----------
| accessToken                   | String| Access Token. Use getAccessToken to get it
| teamDriveId                   | String| The ID of the Team Drive
| backgroundImageFileId         | String| Id of image file. If set also set "backgroundImageFileWidth", "backgroundImageFileXCoordinate", "backgroundImageFileYCoordinate"
| backgroundImageFileWidth      | Number| Width of image file. If set also set "backgroundImageFileId", "backgroundImageFileXCoordinate", "backgroundImageFileYCoordinate"
| backgroundImageFileXCoordinate| Number| xCoordinate of image file. If set also set "backgroundImageFileId", "backgroundImageFileWidth", "backgroundImageFileYCoordinate"
| backgroundImageFileYCoordinate| Number| xCoordinate of image file. If set also set "backgroundImageFileId", "backgroundImageFileWidth", "backgroundImageFileXCoordinate"
| backgroundImageFileYCoordinate| Number| xCoordinate of image file. If set also set "backgroundImageFileId", "backgroundImageFileWidth", "backgroundImageFileXCoordinate"
| colorRgb                      | String| The color of this Team Drive as an RGB hex string. It can only be set on a drive.teamdrives.update request that does not set themeId.
| themeId                       | String| The ID of the theme from which the background image and color will be set. The set of possible teamDriveThemes can be retrieved from a drive.about.get response. When not specified on a drive.teamdrives.create request, a random theme is chosen from which the background image and color are set. This is a write-only field; it can only be set on requests that don't set colorRgb or backgroundImageFile.

