function hcRebarWeightHesapla() {
    const d = parseFloat(document.getElementById('hc-rb-diam').value);
    const l = parseFloat(document.getElementById('hc-rb-len').value);

    if (!l) {
        alert('Lütfen uzunluğu giriniz.');
        return;
    }

    // Theoretical weight formula: d^2 / 162 = kg/m
    const weightPerMeter = (d * d) / 162;
    const totalWeight = weightPerMeter * l;

    const resVal = document.getElementById('hc-rb-res-val');
    resVal.innerText = totalWeight.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const resUnit = document.getElementById('hc-rb-res-unit');
    resUnit.innerText = `Birim Ağırlık: ${weightPerMeter.toFixed(3)} kg/m`;

    document.getElementById('hc-rebar-result').classList.add('visible');
}
