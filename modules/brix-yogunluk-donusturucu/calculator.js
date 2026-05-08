function hcBrixToSg() {
    const brix = parseFloat(document.getElementById('hc-brix-val').value);
    if (isNaN(brix)) return;
    
    // Precise SG formula
    const sg = 1.000019 + (0.003856 * brix) + (0.0000155 * Math.pow(brix, 2)) + (0.00000026 * Math.pow(brix, 3));
    document.getElementById('hc-brix-sg').value = sg.toFixed(3);
}

function hcSgToBrix() {
    const sg = parseFloat(document.getElementById('hc-brix-sg').value);
    if (isNaN(sg)) return;
    
    // Precise Brix from SG
    const brix = (((182.4601 * sg - 775.6821) * sg + 1262.7794) * sg - 669.5622);
    document.getElementById('hc-brix-val').value = brix.toFixed(1);
}
