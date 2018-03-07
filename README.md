# Multilingual
This script can handle the operation of retrieving data from the locale files easily for the current language registered in session by passing a string like `'blog.post.title'` while `blog` is a directory and `post` is file and `title` is the key for the string to retrieve.

Of course you can pass any length of string following this criteria `'dir.dir.dir.file.key'`.
- `dir`  : is a directory name.
- `file` : is a file name without the php extension.
- `key`  : is the key of the element to retrieve from the file.

**Note:** All files should have the php extension and return an array of key:value elements.
