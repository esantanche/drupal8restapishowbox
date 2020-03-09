<script>
  export let article;
</script>

<style>
  /* .radiogroup {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  } */

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
    /* border: 1px solid; */
    margin: 0 0.5em;
  }
</style>

<!-- Assuming that the article includes an image -->

<div class="articlecontainer">
  <div class="imagecolumn">
    <img src={article.image} alt={article.title} style="width: 100%"/>
  </div>
  <div class="titlecolumn">
    <div class="text-box">{article.title}</div>
  </div>
</div>



<!-- display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center; -->


	
