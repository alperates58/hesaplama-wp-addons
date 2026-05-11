function hcYuzdeGetiriHesapla() {
    const first = parseFloat(document.getElementById('hc-yg-first').value);
    const last = parseFloat(document.getElementById('hc-yg-last').value);

    if (isNaN(first) || isNaN(last) || first === 0) {
        alert('Lütfen geçerli değerler girin. İlk değer 0 olamaz.');
        return;
    }

    const diff = last - first;
    const ratio = (diff / first) * 100;

    document.getElementById('hc-yg-res-ratio').innerText = (ratio > 0 ? '+' : '') + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + '%';
    document.getElementById('hc-yg-res-diff').innerText = diff.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    const ratioElem = document.getElementById('hc-yg-res-ratio');
    ratioElem.style.color = ratio >= 0 ? 'green' : 'red';

    document.getElementById('hc-yg-result').classList.add('visible');
}
