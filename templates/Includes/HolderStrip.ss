<% loop $FlowChildren %>
    <a href="$AbsoluteLink">
        <div class="flow-holder-strip" style="background-color: $HashColor;">
            <div class="panel-text">
                <h2 class="flow-strip-title">$Title</h2>
                <div class="flow-strip-text">$Statement</div>
            </div>
            <div class="panel-arrow"></div>
        </div>
    </a>
<% end_loop %>

