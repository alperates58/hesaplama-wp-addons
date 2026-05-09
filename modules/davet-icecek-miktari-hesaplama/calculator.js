function hcPartyDrinkHesapla() {
    const people = parseInt(document.getElementById('hc-pd-people').value) || 0;
    const hours = parseInt(document.getElementById('hc-pd-duration').value) || 1;

    // Standart tüketim oranları
    const water = people * 0.5 * (hours / 3); // 3 saatte kişi başı 0.5L su
    const soda = people * 0.4 * (hours / 3);  // 3 saatte kişi başı 0.4L meşrubat
    const hot = people * 1.5;                 // Toplam kişi başı 1.5 fincan

    document.getElementById('hc-res-pd-water').innerText = water.toFixed(1) + ' Litre';
    document.getElementById('hc-res-pd-soda').innerText = soda.toFixed(1) + ' Litre';
    document.getElementById('hc-res-pd-hot').innerText = Math.round(hot) + ' Fincan';
    
    document.getElementById('hc-party-drink-result').classList.add('visible');
}
