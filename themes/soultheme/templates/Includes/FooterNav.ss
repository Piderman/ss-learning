<nav class="aux">
    <ul>
		<% loop $FooterMenu %>
            <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
		<% end_loop %>
    </ul>
</nav>
