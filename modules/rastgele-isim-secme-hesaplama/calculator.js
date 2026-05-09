function hcRandomNameHesapla() {
    const listText = document.getElementById('hc-rn-list').value.trim();
    const count = parseInt(document.getElementById('hc-rn-count').value) || 1;

    if (!listText) {
        alert('Lütfen isim listesini doldurun.');
        return;
    }

    const names = listText.split('\n').map(n => n.trim()).filter(n => n !== "");
    if (names.length === 0) return;

    const winners = [];
    const tempNames = [...names];

    for (let i = 0; i < Math.min(count, names.length); i++) {
        const idx = Math.floor(Math.random() * tempNames.length);
        winners.push(tempNames.splice(idx, 1)[0]);
    }

    const resBox = document.getElementById('hc-res-rn-winner');
    resBox.innerHTML = winners.map(w => `<div class="hc-winner-item">🏆 ${w}</div>`).join('');
    
    document.getElementById('hc-random-name-result').classList.add('visible');
}
