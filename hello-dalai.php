<?php
/*
Plugin Name: Hello Dalai Lama
Plugin URI: http://github.com/jeckman/hello-dalai
Description: Based on a joke made on WP Late Night. Fork of Hello Dolly (http://wordpress.org/extend/plugins/hello-dolly/ ), but 
with quotes from the Dalai Lama. 
Author: John Eckman
Version: 1.0
Author URI: http://www.openparenthesis.org/
*/

function hello_dalai_get_quotes() {
	/** Dalai Lama quotes, one per line */
	/* quotes from http://drawohara.com/post/53796569/dalai-lama-quotes */
	$hello_dalai_quotes = "we can deny everything, except that we have the possibility of being better.  simply reflect on that.
the very purpose of religion is to control yourself, not to criticize others.  rather, we must criticize ourselves.
sleep is the best meditation.
my religion is very simple.  my religion is kindness.
in the practice of tolerance, one's enemy is the best teacher.
happiness is not something ready-made.  it comes from your own actions.
the main cause of suffering is egoistic desire for one's own comfort and happiness.
when you lose, don't lose the lesson.
we can live without religion and meditation, but we cannot survive without human affection.
learn the rules so you know how to break them properly.
don't let a little dispute injure a great friendship.
remember that silence is sometimes the best answer.
share your knowledge.  it's a way to achieve immortality.
judge your success by what you had to give up in order to get it.
where ignorance is our master, there is no possibility of real peace.
when you realize you've made a mistake, take immediate steps to correct it.
try not even to think of yourself as better than the humblest beggar.  you will look the same in your grave.
knowledge is important, but much more important is the use toward which it is put.  this depends on the heart and mind of the one who uses it.
wherever you are, your religious teaching must be there with you.
if you had to analyze all your dreams there would be no time left to dream.
be kind whenever possible… it is always possible.
it is not enough to be compassionate.  you must act.
love and compassion are necessities, not luxuries.  without them humanity cannot survive.
anger is the ultimate troublemaker.
the purpose of our lives is to be happy.
if you have a particular faith or religion, that is good - but you can survive without it.
some people, sweet and attractive, and strong and healthy, happen to die young.  they are masters in disguise teaching us about impermanence.
we can never obtain peace in the outer world until we make peace with ourselves.
suffering increases your inner strength.  also, the wishing for suffering makes the suffering disappear.
on a daily basis, you must take more care of your mind than just money, money, money!
world peace through hatred and force is impossible.
to foster inner awareness, introspection, and reasoning is more efficient than meditation and prayer.
the training of the mind is an art.  if this can be considered as art, one's life is art.
the ultimate authority must always rest with the individual's own reason and critical analysis.
what science finds to be nonexistent, we must accept as nonexistent; but what science merely does not find is a completely different matter… it is quite clear that there are many, many mysterious things.";

	// Here we split it into lines
	$hello_dalai_quotes = explode( "\n", $hello_dalai_quotes );

	// And then randomly choose a line
	return wptexturize( $hello_dalai_quotes[ mt_rand( 0, count( $hello_dalai_quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dalai() {
	$chosen = hello_dalai_get_quotes();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dalai' );

// We need some CSS to position the paragraph
function dalai_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dalai {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dalai_css' );

?>