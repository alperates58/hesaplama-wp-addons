function hcRoasHesapla() {
    const revenue = parseFloat(document.getElementById('hc-roas-revenue').value);
    const spend = parseFloat(document.getElementById('hc-roas-spend').value);

    if (isNaN(revenue) || isNaN(spend) || spend <= 0) {
        alert('Lütfen geçerli gelir ve harcama tutarları girin.');
        return;
    }

    const roas = revenue / spend;
    const valueElem = document.getElementById('hc-roas-value');
    const commentElem = document.getElementById('hc-roas-comment');

    valueElem.innerText = roas.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + 'x';
    
    let comment = "";
    if (roas < 1) comment = "Harcanan miktar kazanılan gelirden yüksek. Zarar ediliyor.";
    else if (roas < 3) comment = "Düşük verimlilik. Kampanya optimizasyonu gerekebilir.";
    else if (roas < 6) comment = "İyi bir ROAS oranı. Kârlı bir kampanya.";
    else comment = "Mükemmel verimlilik! Kampanya oldukça başarılı.";

    commentElem.innerText = comment;
    document.getElementById('hc-roas-result').classList.add('visible');
}
