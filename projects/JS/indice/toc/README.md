# Table of Contents with Pure Javascript

## How to use:
Just call the function with the content container ID and the ID of the element you want it to display the list.

```html
<article id='article'>
  <!-- Content -->
</article>
```

```html
<div id='tc' class="block">
  <!-- Here goes the table content generated by JS -->
</div>
```

Now you just need to call the function.

```javascript
tc('article','tc', document);
```
[Demo](https://arcandres.github.io/table-of-contents/)
