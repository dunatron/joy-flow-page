<div class="flow-holder-wrapper">
    <%-- Flow Page Header--%>
    <% if $FlowHolderImage %>
        <div class="flow-banner" style="background-color: $HashColor;">
            <div class="flow-banner-text">
                <h1>$Title</h1>
            </div>

            <% with $FlowHolderImage.CroppedImage(800,500) %>
                <div class="flow-banner-img" style="background-image:url('$URL');"></div>
            <% end_with %>

        </div>
    <% else %>
        <div class="flow-title-noImage" style="background-color: $HashColor;">
            <h1>$Title</h1>
        </div>
    <% end_if %>

    <%-- Flow Page Strips--%>
    <% if $FlowChildren %>
        <% include HolderStrip %>
    <% end_if %>

    <%-- Flow Page Footer --%>
    <div class="flow-footer">

    </div>
</div>