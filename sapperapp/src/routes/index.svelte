<script>
  import Radiogroup from "../components/Radiogroup.svelte";
  import ArticlesList from "../components/ArticlesList.svelte";

  let type_of_articles;

  // the `$:` means 're-run whenever type_of_articles changes'
  $: articles = getArticles(type_of_articles);

  async function getArticles(type_of_articles) {
    if (type_of_articles) {
      const response = await fetch(
        `https://backend.emanuelesantanche.com/rest_api_demo/demo_resource/${type_of_articles}?_format=json`
      );

      const articles = await response.json();

      if (response.ok) {
        console.log(articles);
        return articles;
      } else {
        throw new Error(todo);
      }
    } else {
      return [];
    }
  }
</script>

<style>
  h1,
  p {
    text-align: center;
    margin: 0 auto;
  }

  h1 {
    font-size: 2em;
    text-transform: uppercase;
    font-weight: 700;
    margin: 0 0 0.5em 0;
  }

  /* figure {
    margin: 0 0 1em 0;
  } */

  /* img {
    width: 100%;
    max-width: 400px;
    margin: 0 0 1em 0;
  } */

  p {
    margin: 1em auto;
  }

  @media (min-width: 480px) {
    h1 {
      font-size: 3em;
    }
  }
</style>

<svelte:head>
  <title>Drupal 8 Rest Api Showbox</title>
</svelte:head>

<h1>Choose a type of articles</h1>

<Radiogroup>
  <label>
    <input type="radio" bind:group={type_of_articles} value="ems_article" />
    Tech only
  </label>

  <label>
    <input type="radio" bind:group={type_of_articles} value="wrt_item" />
    Humanity and tech
  </label>
</Radiogroup>

{#await articles}
  <p>...just a moment</p>
{:then articles}
  {#if articles.length > 0}
    <ArticlesList {articles} />
  {:else if !type_of_articles}
    <p>Choose a type of articles</p>
  {:else}
    <p>
      Either there are no articles for the type you chose, or something went
      wrong.
    </p>
  {/if}
{:catch error}
  <p style="color: red">{error.message}</p>
{/await}
