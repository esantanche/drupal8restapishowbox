<script>
  import Article from "../components/Article.svelte";

  export let articles;
</script>

<!-- This is a list of articles. It takes the prop articles containing the list.
It uses the component Article. -->
{#each articles as article}
  <!-- Displaying only articles that have an image -->
  {#if article.image !== 'undefined'}
    <Article {article} />
  {/if}
{/each}
