<script>
  export let article;
</script>

<style>
  .articlecontainer {
    display: flex;
    justify-content: flex-start;
    width: 100%;
    padding-bottom: 10px;
  }

  .imagecolumn {
    width: 30%;
  }

  .titlecolumn {
    width: 70%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .text-box {
    margin: 0 0.5em;
  }
</style>

<!-- Svelte component that wraps a single article. 
It assumes that the article includes an image.
If the image is not provided, the rendering won't be correct. -->
<!-- Assuming that the article includes an image -->

<div class="articlecontainer">
  <div class="imagecolumn">
    <img src={article.image} alt={article.title} style="width: 100%" />
  </div>
  <div class="titlecolumn">
    <div class="text-box">{article.title}</div>
  </div>
</div>
