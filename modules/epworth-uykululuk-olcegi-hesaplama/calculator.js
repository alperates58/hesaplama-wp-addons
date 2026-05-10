function hcEssHesapla() {
    let total = 0;
    const selects = document.querySelectorAll('.hc-ess-score');
    selects.forEach(s => total += parseInt(s.value));

    const resVal = document.getElementById('hc-ess-res-val');
    const resDesc = document.getElementById('hc-ess-res-desc');

    resVal.innerText = total;

    if (total <= 10) {
        resDesc.innerText = 'Normal (Gündüz uykululuğu yok).';
        resDesc.style.color = '#27ae60';
    } else if (total <= 15) {
        resDesc.innerText = 'Artmış Uykululuk (Orta derecede uykululuk hali).';
        resDesc.style.color = '#f39c12';
    } else {
        resDesc.innerText = 'Şiddetli Uykululuk (Patolojik düzey, bir uzmana danışılmalıdır).';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-ess-result').classList.add('visible');
}
