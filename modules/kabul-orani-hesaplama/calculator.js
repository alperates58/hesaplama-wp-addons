function hcKabulOraniHesapla() {
    const total = parseFloat(document.getElementById('hc-acc-total').value);
    const count = parseFloat(document.getElementById('hc-acc-count').value);

    if (isNaN(total) || isNaN(count) || total <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (count > total) {
        alert('Kabul edilen adet toplam adetten büyük olamaz.');
        return;
    }

    const ratio = (count / total) * 100;
    
    document.getElementById('hc-res-acc-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    let desc = "";
    if (ratio >= 90) desc = "Yüksek kabul oranı.";
    else if (ratio >= 70) desc = "Orta düzey kabul oranı.";
    else desc = "Düşük kabul oranı.";
    
    document.getElementById('hc-acc-desc').innerText = desc;
    document.getElementById('hc-kabul-orani-result').classList.add('visible');
}
