<% include SideBar %>
<h1>{$Title}</h1>
<h2>{$JobTitle}</h2>
<div class="row">
    <div class="clearfix <% if Menu(2) %>span6<% else %>span9<% end_if %>">
		{$Content}
		<% if $ProfilePic %>
            <img src="{$ProfilePic.Url}" alt="">
		<% end_if %>

		<% if $Endorsements %>
            <dl>
				<% loop $PagedEndorsements %>
					<% include StaffEndorsement %>
				<% end_loop %>
            </dl>

			<%-- this is a pager because it just is #dealwithit --%>
			<% if $PagedEndorsements.PrevLink %>
                <a href="$PagedEndorsements.PrevLink">Prev</a>
				<% if $PagedEndorsements.PrevLink && $PagedEndorsements.NextLink %> | <% end_if %>
			<% end_if %>
			<% if $PagedEndorsements.NextLink %>
                <a href="$PagedEndorsements.NextLink">Next</a>
			<% end_if %>
		<% end_if %>
    </div>
	<% if RightContent %>
        <div class="span3">
			$RightContent
        </div>
	<% end_if %>

    <h2>Poor-mans LinkedIn</h2>
	{$EndorsementForm}
</div>
