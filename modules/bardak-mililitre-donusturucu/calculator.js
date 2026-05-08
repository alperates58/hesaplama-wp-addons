function hcCupToMl() {
    const cup = parseFloat(document.getElementById('hc-cupml-cup').value);
    const type = parseFloat(document.getElementById('hc-cupml-type').value);
    if (isNaN(cup)) return;
    document.getElementById('hc-cupml-ml').value = (cup * type).toFixed(1);
}

function hcMlToCup() {
    const ml = parseFloat(document.getElementById('hc-cupml-ml').value);
    const type = parseFloat(document.getElementById('hc-cupml-type').value);
    if (isNaN(ml)) return;
    document.getElementById('hc-cupml-cup').value = (ml / type).toFixed(2);
}
