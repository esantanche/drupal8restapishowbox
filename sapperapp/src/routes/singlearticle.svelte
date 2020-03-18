<script context="module">
	// the (optional) preload function takes a
	// `{ path, params, query }` object and turns it into
	// the data we need to render the page
	export async function preload(page, session) {
		// the `slug` parameter is available because this file
		// is called [slug].svelte
    //const { slug } = page.params;
    
		// `this.fetch` is a wrapper around `fetch` that allows
		// you to make credentialled requests on both
		// server and client
		const res = await this.fetch("https://backend.emanuelesantanche.com/rest/EMS/view/articles?_format=json&langcode=en&nid=162");
    
    const jsonresponse = await res.json();

    const article = jsonresponse.results[0];

		return { article };
	}

</script>

<script>
	export let article;
</script>

<!-- This is the about page FIXME -->
<!-- The <svelte:head> element allows you to insert elements inside the <head> of your document -->
<svelte:head>
  <title>Single article</title>
</svelte:head>

<p>This page showcases fetching a single article. It uses the preload function you find in Sapper. You find the article in the page's source code.</p>

{#await article}
  <p>...just a moment</p>
{:then article}
  <p>Node id of the article: {article.nid}</p>
  <p>Title: {article.title}</p>
  {@html article.body}
{:catch error}
  <p style="color: red">{error.message}</p>
{/await}

