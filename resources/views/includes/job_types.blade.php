<section class="how-it-works py-5">
  <div class="container">
    <section class="popular-searches">
  <div class="left-title">
    <h2 class="text-center fw-bold mb-5">Popular Searches on JobHire India</h2>
  </div>

 @php
$colors = [
    'accent-purple',
    'accent-blue',
    'accent-red',
    'accent-pink',
    'accent-green'
];
@endphp

<div class="cards-grid">
    @foreach($jobTypeCards as $index => $jobType)
        <div class="job-card {{ $colors[$index % count($colors)] }}">
            <span class="trend">TRENDING AT #{{ $index + 1 }}</span>
            <h3>{{ $jobType->job_type }}</h3>

            <a href="{{ route('job.list', ['job_type_id' => [$jobType->id]]) }}"
               class="view-link">
                View all →
            </a>
        </div>
    @endforeach
</div>

</section>
</div>
</section>
<style>
    .how-it-works {
  background:#f4f2f6;
    }

.popular-searches {
  /* display: flex; */
  gap: 40px;
}

.left-title h2 {
  /* font-size: 42px; */
  line-height: 1.2;
  font-weight: 700;
  color: #1b0036;
}

/* Grid */
.cards-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

/* Base Card (NORMAL STATE) */
.job-card {
  padding: 28px;
  border-radius: 18px;
  background: #ffffff;
  border: 1.5px solid #e6e6e6;
  transition: all 0.35s ease;
  cursor: pointer;
}

/* 🔥 HOVER EFFECT ONLY */
.job-card:hover {
  transform: translateY(-4px);
  border-color: var(--main-color);
  background: linear-gradient(
    135deg,
    var(--soft-color),
    #ffffff 65%
  );
  box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
}

/* Text */
.trend {
  font-size: 13px;
  color: #777;
  font-weight: 500;
}

.job-card h3 {
  margin: 12px 0 22px;
  font-size: 22px;
  font-weight: 700;
  color: #111;
}

/* View links */
.view-link {
  font-weight: 600;
  color: #111;
  text-decoration: none;
  transition: color 0.3s;
}

.job-card:hover .view-link {
  color: var(--main-color);
}

/* Button */
.view-btn {
  display: inline-block;
  padding: 10px 18px;
  background: #e53935;
  color: #fff;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
}

/* 🎯 DIFFERENT HOVER COLORS */
.accent-purple {
  --main-color: #6a1b9a;
  --soft-color: #f4e9fb;
}

.accent-blue {
  --main-color: #1976d2;
  --soft-color: #eaf2fd;
}

.accent-red {
  --main-color: #e53935;
  --soft-color: #fdecec;
}

.accent-pink {
  --main-color: #c2185b;
  --soft-color: #fdeaf1;
}

.accent-green {
  --main-color: #2e7d32;
  --soft-color: #edf7ef;
}
</style>