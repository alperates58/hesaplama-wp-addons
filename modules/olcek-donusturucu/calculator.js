function hcScaleCalc() {
    hcScaleCalcMap();
}

function hcScaleCalcMap() {
    const x = parseFloat(document.getElementById('hc-scale-x').value);
    const map = parseFloat(document.getElementById('hc-scale-map').value);
    if (isNaN(x) || isNaN(map) || x === 0) return;
    
    const real = (map * x) / 100000;
    document.getElementById('hc-scale-real').value = real.toLocaleString('tr-TR', {useGrouping: false});
}

function hcScaleCalcReal() {
    const x = parseFloat(document.getElementById('hc-scale-x').value);
    const real = parseFloat(document.getElementById('hc-scale-real').value);
    if (isNaN(x) || isNaN(real) || x === 0) return;
    
    const map = (real * 100000) / x;
    document.getElementById('hc-scale-map').value = map.toLocaleString('tr-TR', {useGrouping: false});
}
