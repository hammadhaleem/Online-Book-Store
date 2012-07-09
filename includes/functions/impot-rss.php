<?php
function import_rss($url)
{
$xml = simplexml_load_file($url);
$channel = $xml->channel;
echo '<div class="footer_re_user_heading">';
echo( "<a href=\"".(string) $channel->link."\" target=\"_blank\" >". (string) $channel->title."</a>\n");
echo '</div>';
echo('<ul class="rss">');
foreach ($channel->item as $item)
{
echo('<li>');
echo "<a href=\" ".(string) $item->link."\" title=\"".(string) $item->description."\" target=\"_blank\" >".(string) $item->title. "</a>\n";
echo('</li>');
}
echo('</ul>');
}
?>