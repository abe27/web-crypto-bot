import { Box, Skeleton, SkeletonCircle, SkeletonText } from '@chakra-ui/react'

const Skeletons = ({
  padding = '6',
  boxShadow = 'lg',
  bg = 'white',
  size = '10',
  mt = '4',
  noOfLines = 4,
  spacing = '4',
}) => {
  return (
    <Box padding={padding} boxShadow={boxShadow} bg={bg}>
      <SkeletonCircle size={size} />
      <SkeletonText mt={mt} noOfLines={noOfLines} spacing={spacing} />
    </Box>
  )
}

export default Skeletons
