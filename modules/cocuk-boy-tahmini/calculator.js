function hcCocukBoyTahminiHesapla() {
    const cinsiyet = document.getElementById('hc-cbt-cinsiyet').value;
    const anne = parseFloat(document.getElementById('hc-cbt-anne').value);
    const baba = parseFloat(document.getElementById('hc-cbt-baba').value);

    if (isNaN(anne) || isNaN(baba)) {
        alert('Lütfen anne ve babanın boyunu giriniz.');
        return;
    }

    let hedefBoy = 0;
    if (cinsiyet === 'erkek') {
        hedefBoy = (anne + baba + 13) / 2;
    } else {
        hedefBoy = (anne + baba - 13) / 2;
    }

    const minBoy = hedefBoy - 5;
    const maxBoy = hedefBoy + 5;

    document.getElementById('hc-cbt-res-boy').innerText = Math.round(hedefBoy) + ' cm';
    document.getElementById('hc-cbt-res-aralik').innerText = 'Tahmini Aralık: ' + Math.round(minBoy) + ' cm - ' + Math.round(maxBoy) + ' cm';

    document.getElementById('hc-cocuk-boy-tahmini-result').classList.add('visible');
}
