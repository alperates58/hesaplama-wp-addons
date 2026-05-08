function hcTtHesapla() {
    const avg = parseFloat(document.getElementById('hc-tt-avg').value);
    const fails = document.getElementById('hc-tt-fails').value;

    if (isNaN(avg) || avg < 0 || avg > 100) {
        alert('Lütfen geçerli bir ortalama girin.');
        return;
    }

    let result = "";
    if (fails === 'yes') {
        result = "Zayıf dersiniz olduğu için belge alamazsınız.";
    } else {
        if (avg >= 85) result = "Takdir Belgesi";
        else if (avg >= 70) result = "Teşekkür Belgesi";
        else result = "Belge alacak puan sınırına ulaşamadınız (70.00+).";
    }

    document.getElementById('hc-tt-val').innerText = result;
    document.getElementById('hc-tt-result').classList.add('visible');
}
