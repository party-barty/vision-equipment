<?php
/**
 * Template Name: About – Vision Equipment
 * Description: A structured, skimmable About page layout that matches the Master Messaging Guide. Uses page content if present; otherwise renders a default layout.
 */

defined('ABSPATH') || exit;

get_header();
the_post();

// Optional custom fields (use ACF or native custom fields if you want)
// ve_subtitle: string
// ve_cta_label: string (default: "Contact Your Local Rep")
// ve_cta_url: string (default: "/contact")
$subtitle  = get_post_meta(get_the_ID(), 've_subtitle', true);
$cta_label = get_post_meta(get_the_ID(), 've_cta_label', true) ?: 'Contact Your Local Rep';
$cta_url   = get_post_meta(get_the_ID(), 've_cta_url', true) ?: '/contact';

// Helper to print section titles safely
function veh($str) { echo esc_html($str); }
?>
<main id="primary" class="site-main ve-about">
  <article id="post-<?php the_ID(); ?>" <?php post_class('ve-about__article'); ?>>

    <!-- Hero -->
    <header class="ve-about__hero">
      <div class="ve-container">
        <h1 class="ve-about__title"><?php the_title(); ?></h1>
        <?php if ($subtitle) : ?>
          <p class="ve-about__subtitle"><?php echo wp_kses_post($subtitle); ?></p>
        <?php endif; ?>
      </div>
    </header>

    <?php
    // If the editor has content/blocks, render it and we’re done.
    $content = trim(get_the_content());
    if (!empty($content)) :
    ?>
      <div class="ve-container entry-content ve-about__content">
        <?php
          // Standard the_content() handles blocks, shortcodes, etc.
          the_content();

          // Optional: built-in WP pagination for multi-page content
          wp_link_pages([
            'before' => '<div class="page-links">' . esc_html__('Pages:', 've'),
            'after'  => '</div>',
          ]);
        ?>
      </div>

    <?php else : ?>
      <!-- Default structured layout (renders if page has no editor content) -->
      <div class="ve-container ve-about__default">

        <!-- Intro -->
        <section class="ve-section" aria-labelledby="ve-intro-h2">
          <h2 id="ve-intro-h2">Proven Process Solutions for Texas Water &amp; Wastewater</h2>
          <p>
            Since 2003, Vision Equipment has helped Texas municipalities optimize water and wastewater treatment
            with proven, field-tested technologies from manufacturers that invented their markets. We’ve supported
            over 200 facilities with solutions that reduce costs, improve compliance, and deliver long-term reliability.
          </p>
        </section>

        <hr class="ve-rule" />

        <!-- Our Story -->
        <section class="ve-section" aria-labelledby="ve-story-h2">
          <h2 id="ve-story-h2">Our Story</h2>
          <p>
            Founded in 2003, Vision Equipment was built on a simple belief: municipalities deserve equipment partners
            who put performance and service above salesmanship. Our team includes licensed engineers, former
            contractors, and technical specialists who understand projects from design through construction.
          </p>
          <ul class="ve-list">
            <li><strong>Proven Performance</strong> — solutions backed by data, case studies, and uptime results</li>
            <li><strong>U.S.-Based Manufacturing</strong> — fully BABA/Buy America compliant</li>
            <li><strong>End-to-End Service</strong> — design support, constructability insights, and responsive after-sale care</li>
          </ul>
        </section>

        <hr class="ve-rule" />

        <!-- Our Approach -->
        <section class="ve-section" aria-labelledby="ve-approach-h2">
          <h2 id="ve-approach-h2">Our Approach</h2>
          <p>
            Texas utilities face tighter budgets, rising polymer costs, workforce shortages, and climate-driven capacity challenges.
            That’s why we focus on <strong>process optimization</strong>—helping facilities do more with less.
          </p>
          <ul class="ve-list">
            <li>Lower OPEX and extended asset life</li>
            <li>Reduced operator attention with automation</li>
            <li>Predictable costs and reliable compliance outcomes</li>
          </ul>
        </section>

        <hr class="ve-rule" />

        <!-- Partners -->
        <section class="ve-section" aria-labelledby="ve-partners-h2">
          <h2 id="ve-partners-h2">Partners Who Invented Their Markets</h2>
          <p>
            When you work with Vision Equipment, you’re choosing manufacturers that defined—and continue to advance—the technologies
            at the core of modern treatment.
          </p>

          <div class="ve-grid">
            <div>
              <h3>Headworks &amp; Screening</h3>
              <ul class="ve-list">
                <li>Duperon</li>
              </ul>
            </div>
            <div>
              <h3>Aeration</h3>
              <ul class="ve-list">
                <li>Jaeger Aeration</li>
                <li>APG-Neuros</li>
              </ul>
            </div>
            <div>
              <h3>Solids Handling</h3>
              <ul class="ve-list">
                <li>Franklin Miller</li>
                <li>Envirodyne</li>
              </ul>
            </div>
            <div>
              <h3>Reuse &amp; Process Optimization</h3>
              <ul class="ve-list">
                <li>Specialty partners</li>
              </ul>
            </div>
          </div>
        </section>

        <section class="ve-section" aria-labelledby="ve-proof-h2">
          <h2 id="ve-proof-h2">Proof in the Field</h2>
          <ul class="ve-list">
            <li><strong>McAllen, TX:</strong> APG-Neuros Turbo Blowers → 1M+ hours, 99% uptime, 40% energy savings</li>
            <li><strong>Retrofit Savings:</strong> Jaeger Aeration projects → 20–40% reduction in aeration costs</li>
            <li><strong>Smarter Screening:</strong> Duperon FlexRake IQ2® → 50% reduction in two-stage screening costs</li>
          </ul>
        </section>

        <hr class="ve-rule" />

        <!-- Values -->
        <section class="ve-section" aria-labelledby="ve-values-h2">
          <h2 id="ve-values-h2">Our Values</h2>
          <ul class="ve-list">
            <li><strong>Integrity:</strong> Ethical bidding and loyalty to customers</li>
            <li><strong>Quality:</strong> No substitute for equipment that works as promised</li>
            <li><strong>Continuity:</strong> Stable leadership and minority-certified ownership</li>
            <li><strong>Service:</strong> From design to construction and beyond</li>
            <li><strong>Growth:</strong> Trust-based, long-term partnerships</li>
          </ul>
        </section>

        <hr class="ve-rule" />

        <!-- Team -->
        <section class="ve-section" aria-labelledby="ve-team-h2">
          <h2 id="ve-team-h2">Meet the Team</h2>
          <p>Vision Equipment is led by professionals who bring decades of experience in engineering, operations, and municipal project delivery.</p>
          <ul class="ve-team">
            <li><strong>David Bartlett</strong> — CEO / Co-Founder</li>
            <li><strong>Chris Lakin, P.E.</strong> — Equipment Applications Specialist</li>
            <li><strong>Hershel Ezzell, Jr., P.E.</strong></li>
            <li><strong>Chris Hanley</strong></li>
            <li><strong>Randall Eulenfeld</strong></li>
            <li><strong>Keisha Antoine, Ph.D., P.E.</strong></li>
            <li><strong>Mike Neill</strong></li>
            <li><strong>Bryan Black</strong></li>
            <li><strong>Abby Bartlett</strong></li>
          </ul>
          <p><a class="ve-link" href="/team">View full bios on our Team page &raquo;</a></p>
        </section>

        <hr class="ve-rule" />

        <!-- Social Proof + CTA -->
        <section class="ve-section ve-cta" aria-labelledby="ve-trust-h2">
          <h2 id="ve-trust-h2">Trusted by Texas Municipalities Since 2003</h2>
          <p>With over 200 facilities supported and 500+ projects completed, Vision Equipment is your trusted partner for proven water and wastewater process improvements.</p>
          <p>
            <a class="ve-button" href="<?php echo esc_url($cta_url); ?>">
              <?php veh($cta_label); ?>
            </a>
          </p>
        </section>

      </div>
    <?php endif; ?>

  </article>
</main>

<?php get_footer(); ?>