/**
 * set rem unit
 */
(function(g, d){

    function remReSize() {
        var de = d.documentElement, 
            cw = de.clientWidth, 
            dpr = g.devicePixelRatio || 1;

        cw = cw > 750 ? 750*dpr : cw;
        de.style.fontSize =  cw/7.5 + 'px';
        de.setAttribute('data-dpr', dpr)
    }
    
    g.addEventListener('resize', remReSize)
    d.addEventListener('DOMContentLoaded', remReSize);

}(window, document))