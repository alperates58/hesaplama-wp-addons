function hcBasamakAcilimHesapla() {
    const nRaw = document.getElementById('hc-pve-val').value;
    if (!nRaw) {
        alert('Lütfen bir sayı girin.');
        return;
    }

    const nStr = Math.abs(parseInt(nRaw)).toString();
    const len = nStr.length;
    let parts = [];
    let listHtml = '<ul>';

    const labels = [
        'Birler', 'Onlar', 'Yüzler', 'Binler', 'On Binler', 'Yüz Binler', 
        'Milyonlar', 'On Milyonlar', 'Yüz Milyonlar'
    ];

    for (let i = 0; i < len; i++) {
        const digit = parseInt(nStr[i]);
        const power = len - 1 - i;
        const placeValue = digit * Math.pow(10, power);

        if (digit !== 0) {
            parts.push(placeValue);
        }
        
        if (power < labels.length) {
            listHtml += `<li><strong>${labels[power]} Basamağı:</strong> ${digit} × ${Math.pow(10, power).toLocaleString('tr-TR')} = ${placeValue.toLocaleString('tr-TR')}</li>`;
        }
    }
    listHtml += '</ul>';

    document.getElementById('hc-res-pve-val').innerText = parts.map(p => p.toLocaleString('tr-TR')).join(' + ');
    document.getElementById('hc-res-pve-list').innerHTML = listHtml;

    document.getElementById('hc-pve-result').classList.add('visible');
}
