### Requirements
- PHP cURL extension
- PHP 7

### Endpoint
`POST /send`

### Parameters
`mno:+6591234567`

`msg:test message`

### Example Response
Status code `200`


`{
"Ok"  
}`

Status Code `422`

`{
"ERR"  
}`

### Remarks
- All parameters must be URL encoded.
- Print “Message sent successfully” if the response matched with successful response.
- Print “Error. Please check with administrator.” if the response matched with failed response.
