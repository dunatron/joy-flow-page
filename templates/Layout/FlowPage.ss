<div class="flow-page-wrapper">
    <%-- Flow Page Header--%>
    <% if $FlowPageImage %>
        <div class="flow-banner" style="background-color: $HashColor;">
            <div class="flow-banner-text">
                <h1>$Title</h1>
            </div>

            <% with $FlowPageImage.CroppedImage(800,500) %>
                <div class="flow-banner-img" style="background-image:url('$URL');"></div>
            <% end_with %>

        </div>
    <% else %>
        <div class="flow-title-noImage" style="background-color: $HashColor;">
            <h1>$Title</h1>
        </div>
    <% end_if %>

    <%-- Flow Page Content--%>
    <div class="flow-content">
        <div class="flow-breadcrumbs">
            $Breadcrumbs
        </div>
        <div class="flow-divider" style="border-color: $HashColor;"></div>

    </div>
    <%-- Flow Page Footer --%>
    <% if $getNextFlowPage %>
        <% loop $getNextFlowPage %>
            <a href="$AbsoluteLink" class="next-footer-link">
                <div class="flow-footer" style="background-color: $HashColor;">
                    <div class="flow-next-page">
                        <div class="panel-text">
                            <span class="next">NEXT PAGE</span>
                            <span class="next-title">$Title</span>
                        </div>
                        <div class="panel-arrow">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        <% end_loop %>
    <% end_if %>
</div>