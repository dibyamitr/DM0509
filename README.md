# DM0509
Class for Encoding and Decoding Array or String

## dm0509Encoder
Method for encoding a string or an array.
*Parameter : Array or String*
*Return : Encoded String*

```php
    $encode_str = 'String or Array to be encoded';
    $output = dm0509Encoder($encode_str);
```

## dm0509Decoder
Method for decoding the encoded string from dm0509Encoder to the respective String or Array
*Parameter : Encoded String*
*Return : Array or String*

```php
    $decode_str = '<Encoded String>';
    $output = dm0509Decoder($decode_str);
```

**dm0509Encoder** method will return different encoded string everytime for same Array or String. However whatever be the encoded string it will always return the original Array or String with **dm0509Decoder method**

## License
[The Unlicense](https://choosealicense.com/licenses/unlicense/)