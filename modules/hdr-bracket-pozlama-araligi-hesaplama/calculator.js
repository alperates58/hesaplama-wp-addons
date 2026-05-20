function hcHdrBracketPozlamaAralgiHesapla() {
    var numShots = parseInt(document.getElementById('hc-hdr-num-shots').value);
    var sceneContrast = parseFloat(document.getElementById('hc-hdr-scene-contrast').value);

    if (isNaN(numShots) || isNaN(sceneContrast) || numShots <= 0 || sceneContrast <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // EV spacing = total contrast / (number of shots - 1)
    var evSpacing = sceneContrast / (numShots - 1);

    // Çekim sırası oluştur
    var sequence = [];
    var startEv = -sceneContrast / 2;
    for (var i = 0; i < numShots; i++) {
        var ev = startEv + (i * evSpacing);
        var evStr = ev > 0 ? '+' + ev.toFixed(1) : ev.toFixed(1);
        sequence.push('Çekim ' + (i + 1) + ': EV ' + evStr);
    }

    var evSpacingStr = evSpacing.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' stops';
    var sequenceStr = sequence.join('<br>');

    document.getElementById('hc-hdr-ev-spacing-val').innerText = evSpacingStr;
    document.getElementById('hc-hdr-sequence-val').innerHTML = sequenceStr;

    document.getElementById('hc-hdr-bracket-pozlama-araligi-hesaplama-result').classList.add('visible');
}
