function hcXbarRHesapla() {
    const xdb = parseFloat(document.getElementById('hc-xr-xdouble').value) || 0;
    const rb = parseFloat(document.getElementById('hc-xr-rbar').value) || 0;
    const n = parseInt(document.getElementById('hc-xr-n').value);

    // Xbar-R Control Chart constants (A2, D3, D4)
    const constants = {
        2: { a2: 1.880, d3: 0, d4: 3.267 },
        3: { a2: 1.023, d3: 0, d4: 2.574 },
        4: { a2: 0.729, d3: 0, d4: 2.282 },
        5: { a2: 0.577, d3: 0, d4: 2.114 },
        6: { a2: 0.483, d3: 0, d4: 2.004 },
        7: { a2: 0.419, d3: 0.076, d4: 1.924 },
        8: { a2: 0.373, d3: 0.136, d4: 1.864 },
        9: { a2: 0.337, d3: 0.184, d4: 1.816 },
        10: { a2: 0.308, d3: 0.223, d4: 1.777 }
    };

    const c = constants[n];

    const xUcl = xdb + (c.a2 * rb);
    const xLcl = xdb - (c.a2 * rb);
    const rUcl = c.d4 * rb;
    const rLcl = c.d3 * rb;

    document.getElementById('hc-res-xr-xucl').innerText = xUcl.toFixed(4);
    document.getElementById('hc-res-xr-xlcl').innerText = xLcl.toFixed(4);
    document.getElementById('hc-res-xr-rucl').innerText = rUcl.toFixed(4);
    document.getElementById('hc-res-xr-rlcl').innerText = rLcl.toFixed(4);
    
    document.getElementById('hc-xbar-r-result').classList.add('visible');
}
