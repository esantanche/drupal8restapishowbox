<script>
  import Nav from "../components/Nav.svelte";

  export let segment;
</script>

<style>
  main {
    position: relative;
    max-width: 56em;
    background-color: white;
    padding: 2em;
    margin: 0 auto;
    box-sizing: border-box;
  }
</style>

<!-- To create a layout component that applies to every page, make a file called src/routes/_layout.svelte -->
<Nav {segment} />

<main>
  <slot />
</main>
