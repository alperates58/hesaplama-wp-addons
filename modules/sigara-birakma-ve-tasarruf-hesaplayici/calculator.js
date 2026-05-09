function hcQuitSmokeHesapla() {
    const daily = parseInt(document.getElementById('hc-smoke-daily').value) || 0;
    const price = parseFloat(document.getElementById('hc-smoke-price').value) || 0;

    // Maddi
    const yearlyMoney = (daily / 20) * price * 365;
    
    // Zaman: 1 sigara ~8 dakika ömür kısaltır (tahmini) + 5 dk içme süresi
    const yearlyMinutes = daily * 5 * 365;
    const yearlyDays = (yearlyMinutes / 1440).toFixed(1);

    document.getElementById('hc-res-smoke-money').innerText = yearlyMoney.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-res-smoke-time').innerText = yearlyDays + ' Gün (Sadece İçme Süresi)';
    
    document.getElementById('hc-res-smoke-health').innerHTML = `
        <b>Sağlık Kazanımı:</b> 1 yıl sonra kalp krizi riskiniz yarıya iner, 
        10 yıl sonra akciğer kanseri riskiniz %50 azalır. 
        Bu tasarruf ile her yıl bir <b>iPhone</b> veya <b>yurt dışı tatili</b> alabilirsiniz.
    `;

    document.getElementById('hc-quit-smoke-result').classList.add('visible');
}
