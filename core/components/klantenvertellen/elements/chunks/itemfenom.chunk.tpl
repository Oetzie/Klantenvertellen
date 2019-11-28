<h3>{$name}</h3>
<p><time>{$time_ago}</time></p>
{if !empty($content_html)}
    <p>{$content_html}</p>
{/if}
<p class="rating">
    <span class="stars star-{$rating_stars}"><span></span></span>({$rating_stars} / 5)
</p>