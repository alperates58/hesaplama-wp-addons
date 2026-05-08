function hcTspToMl() {
    const tsp = parseFloat(document.getElementById('hc-tspml-tsp').value);
    const type = parseFloat(document.getElementById('hc-tspml-type').value);
    if (isNaN(tsp)) return;
    document.getElementById('hc-tspml-ml').value = (tsp * type).toFixed(2);
}

function hcMlToTsp() {
    const ml = parseFloat(document.getElementById('hc-tspml-ml').value);
    const type = parseFloat(document.getElementById('hc-tspml-type').value);
    if (isNaN(ml)) return;
    document.getElementById('hc-tspml-tsp').value = (ml / type).toFixed(2);
}
