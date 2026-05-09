function hcPermRepHesapla() {
    const n = parseInt(document.getElementById('hc-pr-n').value) || 0;
    const counts = document.getElementById('hc-pr-counts').value.split(',').map(x => parseInt(x.trim())).filter(x => !isNaN(x) && x > 1);

    if (n <= 0) return;

    function fact(num) {
        let res = 1;
        for (let i = 2; i <= num; i++) res *= i;
        return res;
    }

    let denom = 1;
    let sumCounts = 0;
    counts.forEach(c => {
        denom *= fact(c);
        sumCounts += c;
    });

    if (sumCounts > n) {
        alert('Tekrar eden elemanların toplamı n değerinden büyük olamaz.');
        return;
    }

    const result = fact(n) / denom;

    document.getElementById('hc-res-pr-val').innerText = Math.round(result).toLocaleString('tr-TR');
    document.getElementById('hc-perm-rep-result').classList.add('visible');
}
