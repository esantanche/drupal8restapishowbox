<script>
  import Article from "../components/Article.svelte";
  // TODO do I need this here?
  //export let segment;
  export let articles;
</script>

<style>
  /* .radiogroup {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  } */
</style>

<!-- We have article.title and article .image -->

<!-- <div class="radiogroup">
	<slot></slot>
</div> -->

{#each articles as article}
  <!-- Displaying only articles that have an image -->
  {#if article.image !== 'undefined'}
    <Article {article} />
  {/if}
{/each}
