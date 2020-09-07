<nav aria-labelledby="ibm-pagetitle-h1" role="navigation">
    <div class="ibm-parent" id="ibm-navigation">
 
        <ul aria-labelledby="ibm-pagetitle-h1" role="tree" id="ibm-primary-links">
            <li id="ibm-overview" role="presentation"><a href="/" role="treeitem">Home</a></li>
            @foreach ($menuList as $key => $value)
                <li role="presentation"><a href="{{ $value }}" role="treeitem">{{ $key }}</a></li>
            @endforeach
            <ul role="group">
                <li role="presentation"> <a href="p_account.php" role="treeitem">Account</a> </li>
                <li role="presentation"> <a href="p_competency.php" role="treeitem">Service Lines</a></li>
                <li role="presentation"> <a href="p_showDelegates.php" role="treeitem">Show Delegates</a></li>
                <li role="presentation"> <a href="p_log.php" role="treeitem">Log</a></li>
            </ul>
        </ul>
         
        <div id="ibm-secondary-navigation">
           	<h2>Related links</h2>
            <ul id="ibm-related-links">
                <li role="presentation"><a href="https://w3-connections.ibm.com/wikis/home?lang=en-us#!/wiki/ITDBO/page/OVERTIME%20APPROVAL%20TOOL%20%28OAT%29%20Guidance">OAT Tool Guidance</a></li>
                <li role="presentation"><a href="http://w3.ibm.com/tools/groups">Bluegroups</a></li>
                <li role="presentation"><a href="https://w3.webahead.ibm.com/w3ki/display/PHPatIBM/Home">PHP@IBM Wiki</a></li>
            </ul>
        </div>
     
    </div>
</nav>