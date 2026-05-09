function hcCKMHesapla() {
    const area = parseFloat(document.getElementById('hc-ckm-area').value);
    const typeValue = parseFloat(document.getElementById('hc-ckm-type').value);
    const waste = parseFloat(document.getElementById('hc-ckm-waste').value) || 0;
    const typeText = document.getElementById('hc-ckm-type').options[document.getElementById('hc-ckm-type').selectedIndex].text;

    if (isNaN(area) || area <= 0) {
        alert('Lütfen geçerli bir alan giriniz.');
        return;
    }

    const totalArea = area * (1 + waste / 100);
    let resultText = "";

    if (typeText.includes("Kiremit")) {
        const count = Math.ceil(totalArea * typeValue);
        resultText = count.toLocaleString('tr-TR') + ' Adet Kiremit';
    } else if (typeText.includes("Şıngıl")) {
        const bundles = Math.ceil(totalArea / typeValue);
        resultText = bundles.toLocaleString('tr-TR') + ' Paket Şıngıl';
    } else if (typeText.includes("Panel")) {
        resultText = totalArea.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m² Panel';
    } else {
        const sheets = Math.ceil(totalArea / typeValue);
        resultText = sheets.toLocaleString('tr-TR') + ' Tabaka Onduline';
    }

    document.getElementById('hc-ckm-val').innerText = resultText;
    document.getElementById('hc-ckm-result').classList.add('visible');
}
