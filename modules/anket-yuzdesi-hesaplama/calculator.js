function hcAnketHesapla() {
    const count = parseInt(document.getElementById('hc-sy-count').value);
    const total = parseInt(document.getElementById('hc-sy-total').value);

    if (isNaN(count) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli sayılar girin.');
        return;
    }

    if (count > total) {
        alert('Cevap veren sayısı toplam katılımcıdan büyük olamaz.');
        return;
    }

    const percentage = (count / total) * 100;
    
    // Margin of Error at 95% confidence level
    // Formula: Z * sqrt(p * (1-p) / n)
    // For n, we use the total participants (simplified)
    const z = 1.96;
    const p = count / total;
    const moe = z * Math.sqrt((p * (1 - p)) / total) * 100;

    document.getElementById('hc-res-sy-perc').innerText = '%' + percentage.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-sy-margin').innerText = '±%' + moe.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-sy-result').classList.add('visible');
}
