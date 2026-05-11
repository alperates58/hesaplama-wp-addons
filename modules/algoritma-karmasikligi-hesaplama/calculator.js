function hcAlgoritmaKarmasikligiAnalizEt() {
    const yapi = document.getElementById('hc-algo-yapi').value;
    const n = parseInt(document.getElementById('hc-algo-n').value);

    if (!n || n < 1) {
        alert('Lütfen geçerli bir veri boyutu (N) giriniz.');
        return;
    }

    let bigO = "";
    let ops = 0;
    let note = "";

    switch(yapi) {
        case 'constant':
            bigO = "O(1)";
            ops = 1;
            note = "Veri boyutu ne kadar artarsa artsın işlem süresi sabittir.";
            break;
        case 'linear':
            bigO = "O(N)";
            ops = n;
            note = "Veri boyutu ile işlem süresi doğru orantılı artar.";
            break;
        case 'quadratic':
            bigO = "O(N²)";
            ops = Math.pow(n, 2);
            note = "Veri boyutu arttıkça işlem süresi karesel olarak artar (İç içe döngüler).";
            break;
        case 'cubic':
            bigO = "O(N³)";
            ops = Math.pow(n, 3);
            note = "Veri boyutu arttıkça işlem süresi kübik olarak artar. Büyük verilerde çok yavaştır.";
            break;
        case 'logarithmic':
            bigO = "O(log N)";
            ops = Math.log2(n);
            note = "Çok verimli bir yapıdır. Veri iki katına çıksa bile işlem sayısı sadece bir artar.";
            break;
        case 'linearithmic':
            bigO = "O(N log N)";
            ops = n * Math.log2(n);
            note = "Gelişmiş sıralama algoritmaları için standart karmaşıklıktır.";
            break;
        case 'exponential':
            bigO = "O(2ⁿ)";
            ops = Math.pow(2, n);
            note = "Veri boyutu arttıkça işlem sayısı katlanarak artar. N > 50 için pratikte imkansızdır.";
            break;
    }

    const sonucDiv = document.getElementById('hc-algo-result');
    document.getElementById('hc-algo-res-bigo').innerText = bigO;
    document.getElementById('hc-algo-res-ops').innerText = ops > 1e15 ? "Çok Yüksek" : ops.toLocaleString('tr-TR', {maximumFractionDigits: 0});
    document.getElementById('hc-algo-res-note').innerText = note;

    sonucDiv.classList.add('visible');
}
