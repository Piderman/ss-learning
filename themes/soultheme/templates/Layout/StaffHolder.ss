<% include SideBar %>
<h1>{$Title}</h1>
<div class="row">
    <div class="clearfix <% if Menu(2) %>span6<% else %>span9<% end_if %>">
		{$Content}
	    
	    <dl>
		    <% loop Children %>
                <dt>
	                <a href="{$Link}">{$Title}</a>
                </dt>
                <dd>
	                {$JobTitle}
                </dd>
		    <% end_loop %>
	    </dl>

    </div>
	<% if RightContent %>
        <div class="span3">
			$RightContent
        </div>
	<% end_if %>
</div>